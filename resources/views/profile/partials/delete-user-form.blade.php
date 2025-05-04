<section class="space-y-6">
    <header>
        <h4 class="card-title mb-3 text-lg font-medium text-gray-900">
            {{ __('Hapus Akun') }}
        </h4>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('Setelah akun Anda dihapus, semua sumber daya dan datanya akan dihapus secara permanen. Sebelum menghapus akun Anda, harap unduh data atau informasi apa pun yang ingin Anda simpan.') }}
        </p>
    </header>

    <button
        class="btn btn-danger w-md"
        data-bs-toggle="modal"
        data-bs-target="#confirmUserDeletionModal"
    >{{ __('Hapus Akun') }}</button>

    <!-- Modal -->
    <div class="modal fade" id="confirmUserDeletionModal" tabindex="-1" aria-labelledby="confirmUserDeletionModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form method="post" action="{{ route('profile.destroy') }}" class="modal-content p-6">
                @csrf
                @method('delete')

                <div class="modal-header">
                    <h5 class="modal-title" id="confirmUserDeletionModalLabel">
                        {{ __('Apakah Anda yakin ingin menghapus akun Anda?') }}
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <p class="text-sm text-gray-600">
                        {{ __('Setelah akun Anda dihapus, semua sumber daya dan datanya akan dihapus secara permanen. Silakan masukkan kata sandi Anda untuk mengonfirmasi bahwa Anda ingin menghapus akun Anda secara permanen.') }}
                    </p>

                    <div class="mt-3">
                        <label for="password" class="form-label">{{ __('Kata sandi') }}</label>

                        <input
                            id="password"
                            name="password"
                            type="password"
                            class="form-control mt-1 block w-100"
                            placeholder="{{ __('Kata sandi') }}"
                        />

                        @error('userDeletion.password')
                            <span class="text-danger mt-2">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        {{ __('Batal') }}
                    </button>

                    <button type="submit" class="btn btn-danger" data-single-click>{{ __('Hapus Akun') }}</button>
                </div>
            </form>
        </div>
    </div>
</section>