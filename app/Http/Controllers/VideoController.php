<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($tenant)
    {

        $user = auth()->user();
        $tenant = $user->tenants->where('id',$tenant->id)->first();
        $video = $tenant->video;
        $eligible = false;
        if ($tenant->paket->id != 1 && $tenant->paket->id != 2) {
            $eligible = true;
        }
        $response = [];
        if ($video) {
            $response = ([
                'id' => $video->id,
                'url' => $video->url,
                'video_id' => $video->video_id,
                'eligible' => $eligible
            ]);
        }else{
            $response = $eligible;
        }
        

        

        // return $this->respond(auth()->user());

        return $this->respond($response,"Success");
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($tenant, Request $request)
    {
        $request->validate([
            'url' => 'required',
        ]);


        $video_id = substr($request->url, strpos($request->url, "watch?v=")+8);
        $user = auth()->user();
        $tenant = $user->tenants->where('id',$tenant->id)->first();


        $tenant->video()->create([
            // 'url' => array_slice(config('tenancy.central_domains'), -1)[0].":8000/".$tujuan_upload."/".$nama_file,
            'url' => 'https://www.youtube.com/embed/'.$video_id.'?feature=oembed',
            'video_id' => $video_id
        ]);


        return $this->respondWithMessage("Video has successfully uploaded", 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function show(Video $video)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function edit(Video $video)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Video $video)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function destroy($tenant, Request $request)
    {

        $user = auth()->user();
        $tenant = $user->tenants->where('id',$tenant->id)->first();
        $video = $tenant->video;
 
        // File::delete($foto->url);
        // Storage::delete($foto->url);
        $video->delete();

        return $this->respondWithMessage("Video has successfully deleted", 200);
        //
    }
}
