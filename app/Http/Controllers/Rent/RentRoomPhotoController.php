<?php

namespace App\Http\Controllers\Rent;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Rent\RentBasicInfo;
use App\Rent\RentRoomPhoto;
use Illuminate\Support\Facades\Auth;

class RentRoomPhotoController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Counting the photos
        $countPhotos = count($_FILES['images']['name']);
        // Looping the files
        for ($i = 0; $i < $countPhotos; $i++) {
            // File Loop
            $file_name = $_FILES['images']["tmp_name"][$i];
            // image extension extraction
            $extension = explode("/", $_FILES["images"]["type"][$i]);
            $name = time() . '.' . $extension[1];
            $thumb = time() . '-thumb.' . $extension[1];
            // Original
            \Image::make($file_name)->save(public_path('/storage/Rent/Room-Photos/') . $name);
            $Original =  \Image::make($file_name)->save(public_path('/storage/Rent/Room-Photos/') . $name);
            // thumb
            $Original->resize(200, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            \Image::make($Original)->save(public_path('/storage/Rent/Room-Photos/') . $thumb);
            // Inserting
            // Recording in Database
            $restaurant = RentRoomPhoto::create([
                'rent_basic_info_id' => $request->id,
                'path' => $name,
                'thumb' => $thumb,
                'user_id' => Auth::user()->id,
            ]);
        }

        return response()->json([
            "message" => "Done"
        ]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $photos = RentRoomPhoto::find($id);
        // Delete
        $unlink = public_path() . '/storage/Rent/Room-Photos/' . $photos->path;
        $thumb = public_path() . '/storage/Rent/Room-Photos/' . $photos->thumb;
        // Unlinking all the photos
        unlink($unlink);
        unlink($thumb);
        $photos->delete();
    }
    /**
     *Photos 
     */
    public function photos(RentBasicInfo $rentBasicInfo)
    {
        return $rentBasicInfo->rent_room_photos()->orderBy('created_at', 'desc')->get();
    }
}
