<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FooterMenu;
use Intervention\Image\Facades\Image;

class FooterController extends Controller
{
    public function AllFooterMenu()
    {
        $footer_menu = FooterMenu::latest()->get();
        return view('backend.footer_menu.footer_menu_all', compact('footer_menu'));
    } // End Method

    


    public function AddFooterMenu()
    {
        return view('backend.footer_menu.footer_menu_add');
    } // End Method 

    public function StoreFooterMenu(Request $request)
    {
        FooterMenu::insert([
            'footer_name' => $request->footer_name,
            'footer_url' => $request->footer_url,
            'footer_description' => $request->footer_description,
            'footer_title' => $request->footer_title,
            'slug' => strtolower(str_replace(' ', '_', $request->footer_name)),
        ]);

        $notification = [
            'message' => 'Footer Menu Inserted Successfully',
            'alert-type' => 'info',
        ];

        return redirect()
            ->route('all.footer_menu')
            ->with($notification);
    } // End Method

    public function EditFooterMenu($id)
    {
        $footer_menu = FooterMenu::findOrFail($id);
        return view('backend.footer_menu.footer_menu_edit', compact('footer_menu'));
    } // End Method

    public function UpdateFooterMenu(Request $request)
    {
        $footer_menu_id = $request->id;

        FooterMenu::findOrFail($footer_menu_id)->update([
            'footer_name' => $request->footer_name,
            'footer_url' => $request->footer_url,
            'footer_description' => $request->footer_description,
            'footer_title' => $request->footer_title,
            'slug' => strtolower(str_replace(' ', '_', $request->footer_name)),
        ]);

        $notification = [
            'message' => 'Footer Menu Updated Successfully',
            'alert-type' => 'success',
        ];

        return redirect()
            ->route('all.footer_menu')
            ->with($notification);
    } // End Method

    public function DeleteFooterMenu($id)
    {
        FooterMenu::findOrFail($id)->delete();

        $notification = [
            'message' => 'Footer Menu Deleted Successfully',
            'alert-type' => 'success',
        ];

        return redirect()
            ->back()
            ->with($notification);
    } // End Method
}
