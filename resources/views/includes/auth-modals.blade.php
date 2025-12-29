{{-- Login Modal --}}
<div id="login-modal" class="fixed inset-0 z-[60] hidden overflow-y-auto" aria-labelledby="modal-title" role="dialog"
    aria-modal="true">
    {{-- Backdrop --}}
    <div class="fixed inset-0 bg-stone-900/50 backdrop-blur-sm transition-opacity" onclick="toggleModal('login-modal')">
    </div>

    <div class="flex min-h-full items-center justify-center p-4 text-center sm:p-0">
        <div
            class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-md border border-stone-200">
            <div class="bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4">
                <div class="sm:flex sm:items-start">
                    <div class="mt-3 text-center sm:ml-4 sm:mt-0 sm:text-left w-full">
                        <h3 class="text-2xl font-serif font-bold leading-6 text-stone-900 mb-6 text-center"
                            id="modal-title">Welcome Back</h3>

                        <form method="POST" action="{{ route('login') }}" class="space-y-4">
                            @csrf

                            <div>
                                <label for="email"
                                    class="block text-sm font-medium leading-6 text-stone-900 text-left">Email
                                    Address</label>
                                <div class="mt-2">
                                    <input id="email" name="email" type="email" autocomplete="email" required
                                        class="block w-full rounded-md border-0 py-1.5 text-stone-900 shadow-sm ring-1 ring-inset ring-stone-300 placeholder:text-stone-400 focus:ring-2 focus:ring-inset focus:ring-amber-600 sm:text-sm sm:leading-6 px-3">
                                </div>
                            </div>

                            <div>
                                <label for="password"
                                    class="block text-sm font-medium leading-6 text-stone-900 text-left">Password</label>
                                <div class="mt-2">
                                    <input id="password" name="password" type="password" autocomplete="current-password"
                                        required
                                        class="block w-full rounded-md border-0 py-1.5 text-stone-900 shadow-sm ring-1 ring-inset ring-stone-300 placeholder:text-stone-400 focus:ring-2 focus:ring-inset focus:ring-amber-600 sm:text-sm sm:leading-6 px-3">
                                </div>
                            </div>

                            <div class="text-sm text-right">
                                @if (Route::has('password.request'))
                                    <a href="{{ route('password.request') }}"
                                        class="font-medium text-amber-700 hover:text-amber-600">Forgot password?</a>
                                @endif
                            </div>

                            <div>
                                <button type="submit"
                                    class="flex w-full justify-center rounded-md bg-stone-900 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-stone-800 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-stone-900 transition-colors">Sign
                                    in</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="bg-stone-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6 justify-center">
                <p class="text-sm text-stone-500">Don't have an account? <button type="button"
                        class="font-medium text-amber-700 hover:text-amber-600"
                        onclick="toggleModal('login-modal'); toggleModal('register-modal')">Register now</button></p>
            </div>
        </div>
    </div>
</div>

{{-- Register Modal --}}
<div id="register-modal" class="fixed inset-0 z-[60] hidden overflow-y-auto" aria-labelledby="modal-title" role="dialog"
    aria-modal="true">
    {{-- Backdrop --}}
    <div class="fixed inset-0 bg-stone-900/50 backdrop-blur-sm transition-opacity"
        onclick="toggleModal('register-modal')"></div>

    <div class="flex min-h-full items-center justify-center p-4 text-center sm:p-0">
        <div
            class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg border border-stone-200">
            <div class="bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4">
                <div class="sm:flex sm:items-start">
                    <div class="mt-3 text-center sm:ml-4 sm:mt-0 sm:text-left w-full">
                        <h3 class="text-2xl font-serif font-bold leading-6 text-stone-900 mb-6 text-center"
                            id="modal-title">Create Account</h3>

                        <form method="POST" action="{{ route('register') }}" class="space-y-4">
                            @csrf

                            <div>
                                <label for="name"
                                    class="block text-sm font-medium leading-6 text-stone-900 text-left">Name</label>
                                <input id="name" name="name" type="text" required
                                    class="block w-full rounded-md border-0 py-1.5 text-stone-900 shadow-sm ring-1 ring-inset ring-stone-300 focus:ring-2 focus:ring-inset focus:ring-amber-600 sm:text-sm sm:leading-6 px-3">
                            </div>

                            <div>
                                <label for="reg-email"
                                    class="block text-sm font-medium leading-6 text-stone-900 text-left">Email
                                    Address</label>
                                <input id="reg-email" name="email" type="email" required
                                    class="block w-full rounded-md border-0 py-1.5 text-stone-900 shadow-sm ring-1 ring-inset ring-stone-300 focus:ring-2 focus:ring-inset focus:ring-amber-600 sm:text-sm sm:leading-6 px-3">
                            </div>

                            <div>
                                <label for="username"
                                    class="block text-sm font-medium leading-6 text-stone-900 text-left">Username</label>
                                <input id="username" name="username" type="text" required
                                    class="block w-full rounded-md border-0 py-1.5 text-stone-900 shadow-sm ring-1 ring-inset ring-stone-300 focus:ring-2 focus:ring-inset focus:ring-amber-600 sm:text-sm sm:leading-6 px-3">
                            </div>

                            <div>
                                <label for="phone"
                                    class="block text-sm font-medium leading-6 text-stone-900 text-left">Phone</label>
                                <input id="phone" name="phone" type="text" required
                                    class="block w-full rounded-md border-0 py-1.5 text-stone-900 shadow-sm ring-1 ring-inset ring-stone-300 focus:ring-2 focus:ring-inset focus:ring-amber-600 sm:text-sm sm:leading-6 px-3">
                            </div>

                            <div>
                                <label for="address"
                                    class="block text-sm font-medium leading-6 text-stone-900 text-left">Address</label>
                                <textarea id="address" name="address" rows="2" required
                                    class="block w-full rounded-md border-0 py-1.5 text-stone-900 shadow-sm ring-1 ring-inset ring-stone-300 focus:ring-2 focus:ring-inset focus:ring-amber-600 sm:text-sm sm:leading-6 px-3"></textarea>
                            </div>

                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <label for="reg-password"
                                        class="block text-sm font-medium leading-6 text-stone-900 text-left">Password</label>
                                    <input id="reg-password" name="password" type="password" required
                                        class="block w-full rounded-md border-0 py-1.5 text-stone-900 shadow-sm ring-1 ring-inset ring-stone-300 focus:ring-2 focus:ring-inset focus:ring-amber-600 sm:text-sm sm:leading-6 px-3">
                                </div>
                                <div>
                                    <label for="password-confirm"
                                        class="block text-sm font-medium leading-6 text-stone-900 text-left">Confirm
                                        Password</label>
                                    <input id="password-confirm" name="password_confirmation" type="password" required
                                        class="block w-full rounded-md border-0 py-1.5 text-stone-900 shadow-sm ring-1 ring-inset ring-stone-300 focus:ring-2 focus:ring-inset focus:ring-amber-600 sm:text-sm sm:leading-6 px-3">
                                </div>
                            </div>

                            <div class="mt-6">
                                <button type="submit"
                                    class="flex w-full justify-center rounded-md bg-stone-900 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-stone-800 transition-colors">Register</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="bg-stone-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6 justify-center">
                <button type="button"
                    class="mt-3 inline-flex w-full justify-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-stone-900 shadow-sm ring-1 ring-inset ring-stone-300 hover:bg-stone-50 sm:mt-0 sm:w-auto"
                    onclick="toggleModal('register-modal')">Cancel</button>
            </div>
        </div>
    </div>
</div>

<script>
    function toggleModal(modalID) {
        document.getElementById(modalID).classList.toggle("hidden");
    }
</script>