<?php

declare(strict_types=1);

namespace App\Orchid\Screens;

use Orchid\Screen\Screen;
use Orchid\Support\Facades\Layout;

use App\Models\KitchenItems;
use App\Models\RestaurantOrder;
use App\Models\Rooms;

class PlatformScreen extends Screen
{
    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(): iterable
    {
        return [
            'metrics' => [
                'total_rooms' => Rooms::count(),
                'available_rooms' => Rooms::where('status', 1)->count(),
                'pending_orders' => RestaurantOrder::where('payment_status', 'Pending')->count(),
                'low_stock' => KitchenItems::whereColumn('now_stock', '<', 'min_stock')->count(),
            ],
        ];
    }

    /**
     * The name of the screen displayed in the header.
     */
    public function name(): ?string
    {
        return 'Hotel Management Dashboard';
    }

    /**
     * Display header description.
     */
    public function description(): ?string
    {
        return 'Real-time overview of hotel operations.';
    }

    /**
     * The screen's action buttons.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [];
    }

    /**
     * The screen's layout elements.
     *
     * @return \Orchid\Screen\Layout[]
     */
    public function layout(): iterable
    {
        return [
            Layout::metrics([
                'Total Rooms' => 'metrics.total_rooms',
                'Available Rooms' => 'metrics.available_rooms',
                'Pending Orders' => 'metrics.pending_orders',
                'Low Stock Items' => 'metrics.low_stock',
            ]),
        ];
    }
}
