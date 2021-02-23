<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ResponsibleRequest;
use App\Http\Requests\Admin\UpdateResponsibleRequest;
use App\Responsible;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class AdminResponsibleController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'checkIsAdmin']);
    }

    public function create()
    {
        return \view('admin.responsible.create');
    }

    public function store(ResponsibleRequest $request)
    {
        $sesponsibles = Responsible::all();
        // dd($sesponsibles->count());

        if ($sesponsibles->count() < 4) {
            // return($request);
            // if ($request->hasFile('image')) {
            //     $image = $request->image->store('responsibles');
            //     // تعديل الصورة
            //     $img2 = Image::make('storage/' . $image)->resize(240, 200);
            //     //حفظ الصورة الجديدة بنفس الاسم والمكان
            //     $img2->save();
            // }


            if ($request->hasFile('image')) {

                $file = $request->file('image');
                $extension = $file->getClientOriginalExtension(); // getting image extension
                $filename = time() . '.' . $extension;
                $file->move('img/responsible/', $filename);

                $img2 = Image::make('img/responsible/' . $filename)->resize(240, 200);
                $img2->save();

                $image = 'img/responsible/' . $filename;
            }




            Responsible::create([
                'name' => $request->name,
                'body' => $request->body,
                'image' => $image,
            ]);

            session()->flash('success', 'تم إضافة البيانات بنجاح');
            return \redirect()->back();
        } else {
            session()->flash('error', 'لا يمكن اضافة اكتر من 4 اعضاء');
            return \redirect()->back();
        }
    }

    public function edit(Responsible $responsible)
    {
        return \view('admin.responsible.create', [
            'responsible' => $responsible,
        ]);
    }

    public function update(UpdateResponsibleRequest $request, Responsible $responsible)
    {
        $date = $request->only(['name', 'body']);

        // if ($request->hasFile('image')) {

        //     $image = $request->image->store('responsibles');

        //     $responsible->deleteImage();
        //     // تعديل الصورة
        //     $img2 = Image::make('storage/' . $image)->resize(240, 200);
        //     //حفظ الصورة الجديدة بنفس الاسم والمكان
        //     $img2->save();

        //     $date['image'] = $image;
        // }

        if ($request->hasFile('image')) {

            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension(); // getting image extension
            $filename = time() . '.' . $extension;
            $file->move('img/responsible/', $filename);

            $img2 = Image::make('img/responsible/' . $filename)->resize(240, 200);
            $img2->save();

            $date['image'] = 'img/responsible/' . $filename;
        }

        $responsible->deleteImage();

        $responsible->update($date);

        session()->flash('success', 'تم تحديث البيانات بنجاح');

        return \redirect()->back();
    }

    public function destroy(Responsible $responsible)
    {
        $responsible->deleteImage();
        $responsible->delete();
        session()->flash('success', 'تم الحذف بنجاح');
        return \redirect()->back();
    }
}
