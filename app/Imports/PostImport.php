<?php

namespace App\Imports;

use App\Models\Posts;
use Maatwebsite\Excel\Concerns\ToArray;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class PostImport implements ToArray
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function array(array $array)
    {
        $company = $array['cong_ty'];
        $language = $array['ngon_ngu'];
        $city = $array['dai_diem'];
        $link = $array['link'];

        Posts::create([
            'job_title' => $language,
            'company' => $company,
            'language' => $language,
            'city' => $city,
            'link' => $link,
        ]);
    }
}
