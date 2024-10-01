<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\footer_slider;
use Intervention\Image\Facades\Image;

class FooterSliderController extends Controller
{
    public function AllSlider()
    {
        $sliders = footer_slider::latest()->get();
        return view('backend.footer_slider.footer_slider_all', compact('sliders'));
    } // End Method

    public function AddSlider()
    {
        return view('backend.footer_slider.footer_slider_add');
    } // End Method

    public function StoreSlider(Request $request)
    {
        $image = $request->file('slider_image');
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        Image::make($image)
            ->resize(2376, 807)
            ->save('upload/footerslider/' . $name_gen);
        $save_url = 'upload/footerslider/' . $name_gen;

        footer_slider::insert([
            'slider_title' => $request->slider_title,
            'short_title' => $request->short_title,
            'slider_image' => $save_url,
        ]);

        $notification = [
            'message' => 'Slider Inserted Successfully',
            'alert-type' => 'success',
        ];

        return redirect()
            ->route('footer.slider')
            ->with($notification);
    } // End Method

    public function EditSlider($id)
    {
        $sliders = footer_slider::findOrFail($id);
        return view('backend.footer_slider.footer_slider_edit', compact('sliders'));
    } // End Method

    public function UpdateSlider(Request $request)
    {
        $slider_id = $request->id;
        $old_img = $request->old_image;

        if ($request->file('slider_image')) {
            $image = $request->file('slider_image');
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)
                ->resize(2376, 807)
                ->save('upload/slider/' . $name_gen);
            $save_url = 'upload/slider/' . $name_gen;

            if (file_exists($old_img)) {
                unlink($old_img);
            }

            footer_slider::findOrFail($slider_id)->update([
                'slider_title' => $request->slider_title,
                'short_title' => $request->short_title,
                'slider_image' => $save_url,
            ]);

            $notification = [
                'message' => 'Slider Updated with image Successfully',
                'alert-type' => 'success',
            ];

            return redirect()
                ->route('all.slider')
                ->with($notification);
        } else {
            Slider::findOrFail($slider_id)->update([
                'slider_title' => $request->slider_title,
                'short_title' => $request->short_title,
            ]);

            $notification = [
                'message' => 'Slider Updated without image Successfully',
                'alert-type' => 'success',
            ];

            return redirect()
                ->route('footer.slider')
                ->with($notification);
        } // end else
    } // End Method

    public function DeleteSlider($id)
    {
        $slider = footer_slider::findOrFail($id);
        $img = $slider->slider_image;
        unlink($img);

        footer_slider::findOrFail($id)->delete();

        $notification = [
            'message' => 'Slider Deleted Successfully',
            'alert-type' => 'success',
        ];

        return redirect()
            ->back()
            ->with($notification);
    } // End Method
}
