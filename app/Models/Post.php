<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;

class Post extends Model
{
    use Sluggable;
    const BASE_PATH = 'app/public';
    const DIR_COVER_POSTS = 'cover_posts';
    const COVERS_PATH = self::BASE_PATH . '/' . self::DIR_COVER_POSTS;

    protected $fillable = ['title','description','content', 'active'];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function getCategoriesListAttribute()
    {
        return $this->categories->implode('name',', ');
    }

    public static function createWithPhotoFile(array $data, UploadedFile $file): Post
    {
        try{
            self::uploadFile($file);
            \DB::beginTransaction();
            $post = self::create($data);
            $post->cover_photo = $file->hashName();
            $post->save();
            \DB::commit();
            return $post;
        }catch(\Exception $e){
            \DB::rollback();
            self::deleteFile($file);
            throw $e;
        }
    }

    public function updateWithPhoto(array $data, UploadedFile $file): Post
    {
        try{
            self::uploadFile($file);
            \DB::beginTransaction();
            $this->deletePhoto($this->cover_photo);
            $this->fill($data);
            $this->cover_photo = $file->hashName();
            $this->save();
            \DB::commit();
            return $this;
        }catch(\Exception $e){
            \DB::rollback();
            self::deleteFile($file);
            throw $e;
        }
    }

    public function deleteWithPhoto(): bool
    {
        try{
            \DB::beginTransaction();
            $this->deletePhoto($this->cover_photo);
            $result = $this->delete();
            \DB::commit();
            return $result;
        }catch(\Exception $e){
            \DB::rollback();
            throw $e;
        }
    }

    private function deletePhoto($fileName)
    {
        $dir = self::DIR_COVER_POSTS;
        \Storage::disk('public')->delete("{$dir}/{$fileName}");
    }

    private static function deleteFile(UploadedFile $file)
    {
            $path = self::COVERS_PATH;
            $photoPath = "{$path}/{$file->hashName()}";
            if(file_exists($photoPath)){
                \File::delete($photoPath);
            }
    }

    public static function uploadFile(UploadedFile $file)
    {
        $dir = self::DIR_COVER_POSTS;
        $file->store($dir,['disk'=>'public']);
    }

    public function getPhotoUrlAttribute()
    {
        $path = self::DIR_COVER_POSTS;
        return asset("storage/{$path}/{$this->cover_photo}");
    }
}
