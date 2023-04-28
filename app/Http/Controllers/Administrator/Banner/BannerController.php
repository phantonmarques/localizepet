<?php

namespace App\Http\Controllers\Administrator\Banner;

use App\Http\Controllers\Controller;
use App\ORM\Banner\Banner;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use Intervention\Image\ImageManagerStatic;

class BannerController extends Controller
{
    const PATH_IMAGE = 'storage/';

    public function index(string $type): View
    {
        return view('administrator.pages.banners.index')->with([
            'type' => $type
        ]);
    }

    public function load(Request $request)
    {
        $banners = Banner::where('type', $request->input('type') ?? null)
            ->orderBy('position')->get();

        $result = [];

        foreach ($banners ?? [] as $banner) {

            if (!Storage::exists($banner->path)) {
                continue;
            }
            
            $result[] = [
                'id'   => $banner->id,
                'image' => "data:image/" . pathinfo($banner->path, PATHINFO_EXTENSION) . ";base64," . base64_encode(Storage::get($banner->path)),
                'dateCreate' => date_br($banner->created_at),
                'dateUpdate' => date_br($banner->updated_at),
                'size' => $banner->size,
                'thumb' => Storage::url($banner->path_thumb),
            ];
        }

        return response()->json([
            'files' => $result
        ]);
    }

    public function upload(Request $request)
    {
        try {
            $file = $request->file('file');

            if ($file->getSize() > 10485760) {
                throw new \Exception("O arquivo ultrapassa o limite de 10mb");
            }

            return response()->json([
                'name'  => "{$file->getClientOriginalName()}",
                'image' => "data:image/{$file->getClientOriginalExtension()};base64," . base64_encode($file->get())
            ]);

        } catch(\Throwable $e) {

            return response()->json(exception_details($e))
                ->setStatusCode(Response::HTTP_BAD_REQUEST);
        }
    }

    public function store(Request $request)
    {
        try {
            $type = $request->input('type') ?? null;

            $this->cleanDataAndFiles($type);

            DB::beginTransaction();

            foreach($request->images ?? [] as $index => $image) {

                $imageName = str_random(16, ".{$this->getExtensionInBase64($image)}");
                $imagePath = "banners/{$type}/{$imageName}";
                $imageThumbPath = "banners/{$type}/thumb_{$imageName}";

                $image = explode(',', $image);
                $image = base64_decode(end($image));

                Storage::put($imagePath, $image);
                
                $imageThumb = ImageManagerStatic::make(Storage::path($imagePath))->fit(140, 110)->stream()->detach();

                Storage::put($imageThumbPath, $imageThumb);

                Banner::create([
                    'path'          => $imagePath,
                    'path_thumb'    => $imageThumbPath,
                    'type'          => $type,
                    'size'          => format_size_in_kb(Storage::size($imagePath)),
                    'position'      => $index,
                    'user_id'       => auth()->user()->id,
                ]);
            }

            DB::commit();

            return redirect()->back()->with('success', trans('message_alert.success.update'));

        } catch (\Exception $e) {

            DB::rollBack();

            Log::error(__CLASS__ . '::' . __CLASS__ . ' - ' . exception_details($e));

        }

        return redirect()->back()->with('error', exception_details($e));
    }

    private function cleanDataAndFiles($type): void
    {
        Storage::deleteDirectory("banners/{$type}");
        Banner::where('type', $type)->delete();
    }

    private function getExtensionInBase64($value): string
    {
        $value = current(explode(';', $value));
        $value = explode('/', $value);

        return end($value);
    }
}