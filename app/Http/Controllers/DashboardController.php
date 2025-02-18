<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Member;
use App\Models\Category;
use App\Models\Merch;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function showDashboard()
    {
        return view('dashboard.dashboard', [
            'members' => Member::latest()->get(),
            'events' => Event::latest()->get(),
            'merchs' => Merch::latest()->get(),
        ]);
    }

    public function showDashboardMember()
    {
        $member = Member::get();
        return view('dashboard.members', ['data' => $member]);
    }

    public function showDashboardEvent()
    {
        return view('dashboard.eventManagement' , [
            'events' => Event::latest()->paginate(3),
            'categories' => Category::get()
        ]);
    }

    public function showDashboardMerch()
    {
        return view('dashboard.merchandise', [
            'merchs' => Merch::latest()->paginate(3)
        ]);
    }


    public function showTambahMember()
    {
        return view('dashboard.member.tambahMember');
    }

    public function showTambahEvent()
    {

        $kategori = Category::get();
        
        return view('dashboard.event.tambahEvent', [
            'kategori' => $kategori
        ]);
    }

    public function showTambahMerch()
    {
        return view('dashboard.merch.tambahMerch');
    }

    public function showEditEvent($id)
    {
        $event = Event::where('id', $id)->get();
        $category = Category::get();
        
        return view('dashboard.event.editEvent', [
            'events' => $event,
            'kategori' => $category
        ]);
    }

    public function showEditMerch($id)
    {
        $merch = Merch::where('id', $id)->first();
        
        return view('dashboard.merch.editMerch', [
            'merch' => $merch,
        ]);
    }
    
    
    public function tambahMerch(Request $request)
    {

        // dd($request);

        $request->validate([
            'title' => 'required|string',
            'body' => 'required|string',
            'stok' => 'required|numeric',
            'harga' => 'required|numeric',
            'images.*' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $imagePaths = [];
    
        if($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = 'storage/'. $image->store('event_images', 'public');
                $imagePaths[] = $path;
            }
        }

        Merch::create([
            'nama'=> $request->title,
            'stok' => $request->stok,
            'harga' => $request->harga,
            'slug' => Str::slug($request->title),
            'image' => $imagePaths,
            'body' => $request->body
        ]);

        return back();
    }

    

    public function tambahEvent(Request $request)
    {

        // dd($request);

        $request->validate([
            'title' => 'required|string',
            'body' => 'required|string',
            'date' => 'required|date',
            'status' => 'required|string',
            'kategori' => 'required',
            'images.*' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $imagePaths = [];
    
        if($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = 'storage/'. $image->store('event_images', 'public');
                $imagePaths[] = $path;
            }
        }

        Event::create([
            'judul'=> $request->title,
            'status' => $request->status,
            'tglPelaksanaan' => $request->date,
            'category_id' => $request->kategori,
            'slug' => Str::slug($request->title),
            'image' => $imagePaths,
            'body' => $request->body
        ]);

        return back();
    }

    public function hapusEventbyId(Request $request){
        $validate = $request->validate([
            'id' => 'required'
        ]);

        Event::where('id', $request->id)->delete();
        return back();
    }

    public function hapusMerchbyId(Request $request){
        $validate = $request->validate([
            'id' => 'required'
        ]);

        Merch::where('id', $request->id)->delete();
        return back();
    }

    public function editEvent(Request $request){


        // dd($request);

        $request->validate([
            'id' => 'required',
            'title' => 'required|string',
            'body' => 'required|string',
            'date' => 'required|date',
            'status' => 'required|string',
            'kategori' => 'required',
            'images.*' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $imagePaths = [];
    
        if($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = 'storage/'. $image->store('event_images', 'public');
                $imagePaths[] = $path;
            }
        }

        $event = Event::find($request->id);

        $event->update([
            'judul'=> $request->title,
            'status' => $request->status,
            'tglPelaksanaan' => $request->date,
            'category_id' => $request->kategori,
            'slug' => Str::slug($request->title),
            'image' => $imagePaths,
            'body' => $request->body
        ]);
        
        // Event::create([
        //     'judul'=> $request->title,
        //     'status' => $request->status,
        //     'tglPelaksanaan' => $request->date,
        //     'category_id' => $request->kategori,
        //     'slug' => Str::slug($request->title),
        //     'image' => $imagePaths,
        //     'body' => $request->body
        // ]);

        return back();
    }
    
    public function editMerch(Request $request) {

        $request->validate([
            'nama' => 'required|string',
            'harga' => 'required|string',
            'stok' => 'required|date',
            'body' => 'required|string',
            'images.*' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $imagePaths = [];
    
        if($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = 'storage/'. $image->store('event_images', 'public');
                $imagePaths[] = $path;
            }
        }

        $merch = Merch::find($request->id);
        
        $merch->update([
            'nama'=> $request->title,
            'slug' => Str::slug($request->nama),
            'image' => $imagePaths,
            'harga' => $request->harga,
            'stok' => $request->stok,
            'body' => $request->body
        ]);
        return back();
    }
    
    
    public function tambahMember(Request $request)
    {
        // dd($request);

        $request->validate([
            'nama' => 'required',
            'posisi' => 'required',
            'email' => 'required|email',
            'tampakDepan' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'tampakBelakang' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'NPM' => 'required',
            'tglLahir' => 'required|date',
            'motivasi' => 'required',
            'linkedin' => 'nullable|string',
            'instagram' => 'nullable|string',
            'twitter' => 'nullable|string',
        ]);

  

        

        Member::create([
            'name' => $request->nama,
            'jabatan' => $request->posisi,
            'email' => $request->email,
            'profilePicture' => [
                'tampakDepan' => 'storage/' . $request->file('tampakDepan')->store('profile'),
                'tampakBelakang' => 'storage/' . $request->file('tampakBelakang')->store('profile')
            ],
            'NPM' => $request->NPM,
            'ulangTahun' => $request->tglLahir,
            'sosialMedia' => [
                'linkedin' => $request->linkedin,
                'instagram' => $request->instagram,
                'twitter' => $request->twitter
            ],
            'motivasi' => $request->motivasi
        ]);

        return back();
    }
}
