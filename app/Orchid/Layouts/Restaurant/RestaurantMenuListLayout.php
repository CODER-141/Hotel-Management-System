<?php

namespace App\Orchid\Layouts\Restaurant;

use App\Models\RestaurantMenu;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Actions\DropDown;
use Orchid\Screen\Actions\ModalToggle;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;

class RestaurantMenuListLayout extends Table
{
    /**
     * Data source.
     *
     * The name of the key to fetch it from the query.
     * The results of which will be elements of the table.
     *
     * @var string
     */
    protected $target = 'menuItems';

    /**
     * Get the table cells to be displayed.
     *
     * @return TD[]
     */
    protected function columns(): iterable
    {
        return [
            TD::make('id', 'ID'),

            TD::make('name', 'Name'),

            TD::make('main_menu_id', 'Category')
                ->render(function (RestaurantMenu $menu) {
                    return $menu->mainMenu ? $menu->mainMenu->name : 'N/A';
                }),

            TD::make('image', 'Image')
                ->render(function (RestaurantMenu $menu) {
                    $imageData = json_decode($menu->image ?? '[]');
                    $imageName = is_array($imageData) ? ($imageData[0] ?? null) : $menu->image;

                    if (!$imageName) {
                        return '<span class="text-muted">No Image</span>';
                    }

                    return '<img src="' . asset('images/menus/' . $imageName) . '" 
                                 width="50" 
                                 height="50" 
                                 class="rounded shadow-sm"
                                 style="object-fit: cover;">';
                }),

            TD::make('price', 'Price')
                ->render(function (RestaurantMenu $menu) {
                    return env('CURRENCY', '$') . ' ' . $menu->price;
                }),

            TD::make('discount', 'Discount (%)'),

            TD::make(__('Actions'))
                ->align(TD::ALIGN_CENTER)
                ->width('100px')
                ->render(function (RestaurantMenu $menu) {
                    return DropDown::make()
                        ->icon('bs.three-dots-vertical')
                        ->list([
                            ModalToggle::make(__('Edit'))
                                ->modal('EditModal')
                                ->modalTitle('Edit ' . $menu->name)
                                ->method('createOrUpdate')
                                ->asyncParameters(['id' => $menu->id])
                                ->icon('bs.pencil'),

                            Button::make(__('Delete'))
                                ->icon('bs.trash')
                                ->confirm(__('Are you sure you want to delete this menu item?'))
                                ->method('remove', ['id' => $menu->id]),
                        ]);
                }),
        ];
    }
}
