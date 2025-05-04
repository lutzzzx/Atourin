<section>
    <header>
        <h4 class="card-title mb-3 text-lg font-medium text-gray-900">
            {{ __('Informasi Profil') }}
        </h4>
        <p class="mt-1 text-sm text-gray-600">
            {{ __("Perbarui informasi profil pribadi anda.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6" enctype="multipart/form-data">
        @csrf
        @method('patch')

        <div class="mb-3">
            <label for="name" class="form-label">{{ __('Nama') }}</label>
            <input id="name" name="name" type="text" class="form-control mt-1 block w-full" value="{{ old('name', $user->name) }}" required autofocus autocomplete="name">
            @error('name')
                <span class="text-danger mt-2">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">{{ __('Email') }}</label>
            <input id="email" name="email" type="email" class="form-control mt-1 block w-full" value="{{ old('email', $user->email) }}" required autocomplete="username">
            @error('email')
                <span class="text-danger mt-2">{{ $message }}</span>
            @enderror

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div class="mt-2">
                    <p class="text-sm text-gray-800">
                        {{ __('Your email address is unverified.') }}
                        <button form="send-verification" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <!-- Tambahan untuk Nomor Telepon -->
        <div class="mb-3">
            <label for="regexp-mask" class="form-label">{{ __('Nomor Telepon') }}</label>
            <input id="regexp-mask" name="no_telp" type="text" class="form-control mt-1 block w-full" value="{{ old('no_telp', $user->no_telp) }}">
            @error('no_telp')
                <span class="text-danger mt-2">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="tgl_lahir" class="form-label">{{ __('Tanggal Lahir') }}</label>
            <input id="tgl_lahir" name="tgl_lahir" type="date" class="form-control mt-1 block w-full" value="{{ old('tgl_lahir', $user->tgl_lahir) }}">
            @error('tgl_lahir')
                <span class="text-danger mt-2">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="alamat" class="form-label">{{ __('Alamat') }}</label>
            <textarea id="alamat" name="alamat" class="form-control mt-1 block w-full">{{ old('alamat', $user->alamat) }}</textarea>
            @error('alamat')
                <span class="text-danger mt-2">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="jk" class="form-label">{{ __('Jenis Kelamin') }}</label>
            <select id="jk" name="jk" class="form-control mt-1 block w-full">
                <option value="">{{ __('Pilih Jenis Kelamin') }}</option>
                <option value="laki" {{ old('jk', $user->jk) == 'laki' ? 'selected' : '' }}>{{ __('Laki-laki') }}</option>
                <option value="perempuan" {{ old('jk', $user->jk) == 'perempuan' ? 'selected' : '' }}>{{ __('Perempuan') }}</option>
            </select>
            @error('jk')
                <span class="text-danger mt-2">{{ $message }}</span>
            @enderror
        </div>

        <!-- Tambahan untuk Foto Profil -->
        <div class="mb-3">
            <label for="profile_photo" class="form-label">{{ __('Foto Profil') }}</label>
            <div class="d-flex align-items-center">
                <input id="profile_photo" name="foto" type="file" class="form-control mt-1 block me-3">
                @if ($user->foto)
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#confirmDeleteModal">
                        HapusFoto
                    </button>
                @endif
            </div>
            @if ($user->foto)
                <div class="mt-2">
                    <img src="{{ asset('storage/' . $user->foto) }}" alt="Profile Photo" class="avatar rounded img-thumbnail" width="100">
                </div>
            @endif
            @error('foto')
                <span class="text-danger mt-2">{{ $message }}</span>
            @enderror
        </div>

        <div class="d-flex justify-content-start gap-4">
            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 200)"
                    class="badge bg-success-subtle text-success font-size-12"
                >{{ __('Tersimpan') }}</p>
            @endif
            <button type="submit" class="btn btn-primary w-md" data-single-click>{{ __('Simpan') }}</button>
        </div>
    </form>
    <div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmDeleteModalLabel">Konfirmasi Hapus Foto</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Apakah Anda yakin ingin menghapus foto profil ini?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <form action="{{ route('profile.deletePhoto') }}" method="POST" id="deletePhotoForm">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" data-single-click>Hapus</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

