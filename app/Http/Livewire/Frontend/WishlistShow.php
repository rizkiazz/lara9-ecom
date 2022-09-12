<?php

namespace App\Http\Livewire\Frontend;

use App\Models\WishList;
use Livewire\Component;

class WishlistShow extends Component
{

    public function removeWishlist(int $wishlistId)
    {
        Wishlist::where('user_id', auth()->user()->id)->where('id', $wishlistId)->delete();
        $this->emit('wishlistaAddedUpdated');
        $this->dispatchBrowserEvent('message', [
            'text' => 'Remove wishlist item successfully',
            'type' => 'error',
            'status' => 200
        ]);
        // session()->flash('message', 'Remove wishlist item successfully');
    }
    public function render()
    {
        $wishlist = WishList::all();
        return view('livewire.frontend.wishlist-show', [
            'wishlist' => $wishlist
        ]);
        
    }
}
