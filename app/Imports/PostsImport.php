<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use App\Post;

class PostsImport implements ToCollection, WithHeadingRow
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        foreach ($collection as $item) {
            if (isset($item['zagolovok']) && $item['zagolovok'] != null) {
                Post::firstOrCreate([
                    'title' => $item['zagolovok'],
                ],[
                    'title' => $item['zagolovok'],
                    'content' => $item['kontent'],
                    'image' => $item['izobrazhenie'],
                    'likes' => $item['layki'],
                    'is_published' => $item['status_publikatsii'],
                    'category_id' => $item['kategoriya'],
                ]);
            }
        }
    }
}
