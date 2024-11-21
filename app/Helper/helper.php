<?php

use Illuminate\Support\Str;

if (!function_exists('slugGenerate')) {
    function slugGenerate($title, $table) {
        $slug = Str::slug($title, '-');
        $slugExistCount = DB::table($table)->where('title', $title)->count();
        if ($slugExistCount > 0) $slug = $slug . '-' . ($slugExistCount + 1);
        return $slug;
    }
}
if (!function_exists('slugGenerateUpdate')) {
    function slugGenerateUpdate($title, $table, $productId) {
        $slug = Str::slug($title, '-');
        // Check if a record with the same slug exists (excluding the current product)
        $slugExistCount = DB::table($table)->where('title', $title)->where('id', '!=', $productId)->count();
        
       // If a record with the same slug exists, append a count to make it unique
        if ($slugExistCount > 0) {
            $originalSlug = $slug;
            $count = 1;

            while (true) {
                $slug = $originalSlug . '-' . $count;

                // Check if the new slug exists
                $slugExistCount = DB::table($table)
                    ->where('slug', $slug)
                    ->where('id', '!=', $productId)
                    ->count();

                // If the new slug doesn't exist, break the loop
                if ($slugExistCount === 0) {
                    break;
                }

                $count++;
            }
        }

        return $slug;
    }
}