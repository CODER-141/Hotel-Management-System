<?php

namespace App\Orchid\Screens\Restaurant;

use App\Models\RestaurantMenu;
use App\Models\RestaurantMainMenu;
use App\Orchid\Layouts\Restaurant\RestaurantMenuListLayout;
use Illuminate\Http\Request;
use Orchid\Screen\Actions\ModalToggle;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Select;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Layout;
use Orchid\Support\Facades\Toast;
use Illuminate\Support\Str;

class RestaurantMenuListScreen extends Screen
{
    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(): iterable
    {
        return [
            'menuItems' => RestaurantMenu::with('mainMenu')
                ->filters()
                ->defaultSort('id', 'desc')
                ->paginate(10),
        ];
    }

    /**
     * The name of the screen displayed in the header.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'Restaurant Menu Management';
    }

    /**
     * The screen's action buttons.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [
            ModalToggle::make('Add Menu Item')
                ->modal('CreateModal')
                ->method('createOrUpdate')
                ->icon('bs.plus-circle'),
        ];
    }

    /**
     * The screen's layout elements.
     *
     * @return \Orchid\Screen\Layout[]|string[]
     */
    public function layout(): iterable
    {
        $formLayout = Layout::rows([
            Input::make('menu.id')->type('hidden'),

            Select::make('menu.main_menu_id')
                ->fromModel(RestaurantMainMenu::class, 'name', 'id')
                ->title('Category')
                ->required(),

            Input::make('menu.name')
                ->type('text')
                ->title('Name')
                ->required()
                ->placeholder('Enter item name'),

            Input::make('menu.price')
                ->type('number')
                ->title('Price (' . env('CURRENCY', '$') . ')')
                ->required()
                ->step(0.01),

            Input::make('menu.weight')
                ->type('text')
                ->title('Weight / Portion')
                ->placeholder('e.g. 250g or Large'),

            Input::make('menu.discount')
                ->type('number')
                ->title('Discount (%)')
                ->value(0),

            Input::make('menu.position')
                ->type('text')
                ->title('Display Position')
                ->placeholder('e.g. large, medium, small'),

            Input::make('menu.image')
                ->type('file')
                ->title('Image')
                ->help('Select an image for this menu item'),
        ]);

        return [
            RestaurantMenuListLayout::class,

            Layout::modal('CreateModal', $formLayout)
                ->title('Create New Menu Item')
                ->async('asyncGetData'),

            Layout::modal('EditModal', $formLayout)
                ->title('Edit Menu Item')
                ->async('asyncGetData'),
        ];
    }

    /**
     * @param RestaurantMenu $id
     *
     * @return array
     */
    public function asyncGetData(RestaurantMenu $id): iterable
    {
        return [
            'menu' => $id,
        ];
    }

    /**
     * @param Request $request
     */
    public function createOrUpdate(Request $request): void
    {
        $request->validate([
            'menu.name' => 'required|min:3',
            'menu.price' => 'required|numeric',
            'menu.main_menu_id' => 'required',
            'menu.image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $menuData = $request->get('menu');

        // Remove image from menuData to prevent it from being overwritten by fill()
        unset($menuData['image']);

        $menu = RestaurantMenu::findOrNew($menuData['id'] ?? null);

        // Fill the other fields first
        $menu->fill($menuData);
        $menu->url = Str::slug($menuData['name']);

        // Following Room pattern for images - handle AFTER fill()
        if ($request->hasFile('menu.image')) {
            $image = $request->file('menu.image');
            $filename = str_replace(' ', '_', $image->getClientOriginalName());

            // Ensure folder exists
            if (!file_exists(public_path('images/menus'))) {
                mkdir(public_path('images/menus'), 0755, true);
            }

            $image->move(public_path('images/menus'), $filename);

            // Save as JSON array (Room pattern)
            $menu->image = json_encode([$filename]);
        }

        $menu->save();

        Toast::info(__('Menu item saved successfully.'));
    }

    /**
     * @param Request $request
     */
    public function remove(Request $request): void
    {
        RestaurantMenu::findOrFail($request->get('id'))->delete();

        Toast::info(__('Menu item was removed'));
    }
}
