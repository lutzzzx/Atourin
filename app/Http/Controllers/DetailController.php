<?php

namespace App\Http\Controllers;

use App\Models\Agenda;
use App\Models\Detail;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DetailController extends Controller
{
    
    public function index(Agenda $agenda){
        $details = $agenda->details()->orderBy('mulai')->get();
        return view('details.index', compact('details', 'agenda'));
    }

    protected function authorizeUser(Agenda $agenda)
    {
        if ($agenda->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }
    }

    protected function authorizeDetailUser(Detail $detail)
    {
        if ($detail->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }
    }

    public function create(Agenda $agenda, $kategori)
    {
        $this->authorizeUser($agenda);
        return view('details.create', compact('agenda', 'kategori'));
    }

    public function createTransportasi(Agenda $agenda)
    {
        $this->authorizeUser($agenda);
        $kategori = 'transportasi';
        return view('details.createTransportasi', compact('agenda', 'kategori'));
    }

    public function createDestinasi(Agenda $agenda)
    {
        $this->authorizeUser($agenda);
        $kategori = 'destinasi';
        return view('details.createDestinasi', compact('agenda', 'kategori'));
    }

    public function userDetail(Agenda $agenda, Detail $detail)
    {
        $this->authorizeUser($agenda);
        $userId = Auth::id();
        $details = Detail::where('user_id', $userId)
                         ->where('agenda_id', $agenda->id)
                         ->with(['user', 'agenda'])
                         ->orderBy('mulai')
                         ->get();
        return view('details.userDetail', compact('agenda', 'details'));
    }

    public function store(Request $request, Agenda $agenda)
    {
        $this->authorizeUser($agenda);
        $validatedData = $request->validate([
            'judul' => 'required|string|max:255',
            'kategori' => 'required|in:transportasi,destinasi',
            'biaya' => 'nullable|integer',
            'mulai' => 'nullable|date_format:d-m-Y H:i',
            'selesai' => 'nullable|date_format:d-m-Y H:i',
        ], [
            'judul.required' => 'Judul harus diisikan.',
        ]);
    
        if (!empty($validatedData['mulai'])) {
            $validatedData['mulai'] = Carbon::createFromFormat('d-m-Y H:i', $validatedData['mulai']);
        }
        if (!empty($validatedData['selesai'])) {
            $validatedData['selesai'] = Carbon::createFromFormat('d-m-Y H:i', $validatedData['selesai']);
        }
    
        if (is_null($validatedData['biaya'])) {
            $validatedData['biaya'] = 0;
        }
    
        $validatedData['user_id'] = Auth::id();
        $validatedData['agenda_id'] = $agenda->id;
    
        $detail = Detail::create($validatedData);
    
        return redirect()->route('details.userDetail', ['agenda' => $agenda->id, 'detail' => $detail->id])->with('success', 'Berhasil menambahkan detail');
    }
    

    public function show(Agenda $agenda, Detail $detail)
    {
        $this->authorizeUser($agenda);
        $this->authorizeDetailUser($detail);
        return view('details.show', compact('agenda', 'detail'));
    }

    public function edit(Agenda $agenda, Detail $detail)
    {
        $this->authorizeUser($agenda);
        $this->authorizeDetailUser($detail);
        return view('details.edit', compact('agenda', 'detail'));
    }

    public function editTransportasi(Agenda $agenda, Detail $detail)
    {
        $this->authorizeUser($agenda);
        $this->authorizeDetailUser($detail);
        $detail->mulai = Carbon::parse($detail->mulai)->format('d-m-Y H:i');
        $detail->selesai = Carbon::parse($detail->selesai)->format('d-m-Y H:i');
        $kategori = 'transportasi';
        return view('details.editTransportasi', compact('agenda', 'kategori', 'detail'));
    }

    public function editDestinasi(Agenda $agenda, Detail $detail)
    {
        $this->authorizeUser($agenda);
        $this->authorizeDetailUser($detail);
        $detail->mulai = Carbon::parse($detail->mulai)->format('d-m-Y H:i');
        $detail->selesai = Carbon::parse($detail->selesai)->format('d-m-Y H:i');
        $kategori = 'destinasi';
        return view('details.editDestinasi', compact('agenda', 'kategori', 'detail'));
    }

    public function update(Request $request, Agenda $agenda, Detail $detail)
    {
        $this->authorizeUser($agenda);
        $this->authorizeDetailUser($detail);
        $validatedData = $request->validate([
            'judul' => 'required|string|max:255',
            'kategori' => 'required|in:transportasi,destinasi',
            'biaya' => 'nullable|integer',
            'mulai' => 'nullable|date_format:d-m-Y H:i',
            'selesai' => 'nullable|date_format:d-m-Y H:i',
        ]);

        if (!empty($validatedData['mulai'])) {
            $validatedData['mulai'] = Carbon::createFromFormat('d-m-Y H:i', $validatedData['mulai'])->format('Y-m-d H:i:s');
        }
        if (!empty($validatedData['selesai'])) {
            $validatedData['selesai'] = Carbon::createFromFormat('d-m-Y H:i', $validatedData['selesai'])->format('Y-m-d H:i:s');
        }

        if (is_null($validatedData['biaya'])) {
            $validatedData['biaya'] = 0;
        }

        $validatedData['user_id'] = Auth::id();
        $validatedData['agenda_id'] = $agenda->id;

        $detail->update($validatedData);
        return redirect()->route('details.userDetail', ['agenda' => $agenda->id, 'detail' => $detail->id])->with('success', 'Berhasil mengubah detail');
    }

    public function destroy(Agenda $agenda, Detail $detail)
    {
        $this->authorizeUser($agenda);
        $this->authorizeDetailUser($detail);
        $detail->delete();
        return redirect()->route('details.userDetail', ['agenda' => $agenda->id])->with('success', 'Berhasil menghapus detail');
    }

    public function destroyAgenda(Agenda $agenda)
    {
        $this->authorizeUser($agenda);
        $agenda->delete();
        return redirect()->route('details.userDetails')->with('success', 'Berhasil menghapus agenda');
    }
}

