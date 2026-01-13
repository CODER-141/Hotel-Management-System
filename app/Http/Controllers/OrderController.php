<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RestaurantOrder;
use App\Models\RestaurantOrderItem;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'room_number' => 'required|exists:rooms,id', // room_number is actually room id in the form
            'menu' => 'required|array',
            'quantity' => 'required|array',
            'order_type' => 'required|string',
        ]);

        DB::beginTransaction();

        try {
            // Calculate totals
            $service_charge = env('SERVICE_CHARGE', 100);
            $vat = env('VAT', 50);
            $total_price = $service_charge + $vat;

            // Create Order
            $order = new RestaurantOrder();
            $order->order_number = 'ORD-' . time(); // Generate unique order ID
            $order->user_id = Auth::id(); // Current logged in user
            $order->room_number = $request->room_number;
            $order->booking_id = $request->booking_id ?? 0;
            $order->order_type = $request->order_type;
            $order->service_charge = $service_charge;
            $order->vat = $vat;
            $order->total_amount = $request->total_price; // Or re-calculate for security
            $order->payment_status = 'Pending';
            $order->status = 'Pending';
            $order->date = now();
            $order->save();

            // Save Items
            foreach ($request->menu as $key => $menuId) {
                if (empty($menuId))
                    continue;

                $quantity = $request->quantity[$key];
                $price = $request->price[$key]; // In production, re-fetch price from DB!

                $item = new RestaurantOrderItem();
                $item->order_id = $order->id;
                $item->menu_id = $menuId;
                $item->quantity = $quantity;
                $item->amount = $price * $quantity;
                $item->status = 'Pending';
                $item->date = now();
                $item->save();
            }

            DB::commit();

            return redirect()->back()->with('success', 'Order placed successfully!');

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Failed to place order: ' . $e->getMessage());
        }
    }
}
