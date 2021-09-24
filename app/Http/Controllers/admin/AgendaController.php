<?php

namespace App\Http\Controllers\admin;
use App\Models\Agenda;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class AgendaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Agenda::all();
        return view('pages.admin.agenda.index', [
            'item' => $items
        ]);
    }

    /** 
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $items = Agenda::all();
        return view('pages.admin.agenda.create', [
            'item' => $items
        ]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            "tanggal_mulai" => "required",
            "tanggal_selesai" => "required",
            "nama_agenda" => "required"

        ]);
        $agenda = new Agenda();
        $agenda->tanggal_mulai = $request->get('tanggal_mulai');
        $agenda->tanggal_selesai = $request->get('tanggal_selesai');
        $agenda->nama_agenda = $request->get('nama_agenda');
        $agenda->save();

        return redirect()->route('agenda.index')->with('status', 'Created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Agenda::findOrFail($id);
        return view('pages.admin.agenda.edit', [
            'item' => $item
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $agenda = Agenda::findOrFail($id);
        \Validator::make($request->all(), [
            "tanggal_mulai" => "required",
            "tanggal_selesai" => "required",
            "nama_agenda" => "required",

        ]);

        $agenda->tanggal_mulai = $request->get('tanggal_mulai');
        $agenda->tanggal_selesai = $request->get('tanggal_selesai');
        $agenda->nama_agenda = $request->get('nama_agenda');
        $agenda->save();

        return redirect()->route('agenda.index')->with('status', 'Created successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Agenda::findOrfail($id);
        $item->delete();

        return redirect()->route('agenda.index');
    }
}