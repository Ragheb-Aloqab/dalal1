<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Attachment;
use Illuminate\Support\Facades\Storage;

class AttachmentView extends Component
{
    public $existingImages;



    public function mount($images)
    {
        $this->existingImages = $images; // Initialize the images from the database
    }

    public function deleteImage($imageId)
    {
        $image = Attachment::find($imageId);

        if ($image) {
            Storage::delete($image->file_path);
            $image->delete();
            $this->existingImages = $this->existingImages->reject(function ($item) use ($imageId) {
                return $item->id == $imageId;
            });

            // Emit an event if needed for notification or reactivity
            //    $this->emit('imageDeleted', $imageId);
        }
    }


    public function render()
    {
        return view('livewire.attachment-view');
    }
}
