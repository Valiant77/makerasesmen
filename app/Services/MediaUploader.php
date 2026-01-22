<?
namespace App\Services;

use App\Models\Media;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class MediaUploader {
    public function upload(UploadedFile $file, int $userId, string $type, $attachable = null): Media {
        $path = $file->store('uploads', 'public');

        return Media::create([
            'user_id' => $userId,
            'attachable_type' => $attachable ? get_class($attachable) : null,
            'attachable_id' => $attachable ? $attachable->id : null,
            'type' => $type,
            'path' => $path,
            'filename' => $file->getClientOriginalName(),
            'mime_type' => $file->getClientMimeType(),
            'extension' => $file->getClientOriginalExtension(),
            'size' => $file->getSize(),
        ]);
    }
}