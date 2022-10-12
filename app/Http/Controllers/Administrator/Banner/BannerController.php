<?php

namespace App\Http\Controllers\Administrator\Banner;

use App\Http\Controllers\Controller;
use App\ORM\Banner\Banner;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BannerController extends Controller
{
    const TYPE_HEADER = 'header';
    const TYPE_FOOTER = 'rodape';


    /**
     * Show the configuration to banner.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('administrator.pages.banners.index');
    }

    public function load($type = null)
    {
        $banners = Banner::orderBy('position');

        if ($type == self::TYPE_HEADER) {
            $banners = $banners->where('type', self::TYPE_HEADER);
        } elseif ($type == '') {

        }

        $result = [];

        foreach ($banners->files as $file) {

            $result[] = [
                'id' => $file->id,
                'name' => $file->name . '.' . pathinfo($file->path, PATHINFO_EXTENSION),
                'size' => $file->size,
                'path' => $file->path,
            ];
        }

        return response()->json(['files' => $result]);
    }

    public function upload(Request $request)
    {
        try {
            $file = $request->file('file');

            if ($file->getSize() > 10485760) {
                throw new \Exception("O arquivo ultrapassa o limite de 10mb");
            }

            $path = Storage::putFileAs(
                "public/banner",
                $file,
                Str::random(20) . '.' . strtolower($file->getClientOriginalExtension())
            );

            $banner = Banner::create([
                'path'      => $path,
                'type'      => $request->input('type') ?? null,
                'size'      => number_format($file->getSize() / 1024, 2),
                'position'  => 0,
                'user_id'   => auth()->user()->id,
            ]);

            return response()->json([
                'name' => pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME),
                'size' => $banner->size,
                'path' => $path,
            ]);

            /*
                $table->string('path')->comment('URL parcial do arquivo de banner');
            $table->string('type')->comment('Tipo banner: header, rodapé, ...');
            $table->unsignedSmallInteger('size')->default(600)->comment('Tamanho da imagem em Kb');
            $table->unsignedTinyInteger('position')->default(0)->comment('posicao da imagem');
            $table->unsignedBigInteger('user_id');
             */
        } catch (\Exception $exception) {

            return response()->json($exception->getMessage())->setStatusCode(Response::HTTP_BAD_REQUEST);
        }
    }
}
