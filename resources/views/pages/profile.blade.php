@extends('layouts.tailwind')

@section('content')
    <div class="min-h-screen bg-[#FDFBF7] py-12">
        <div class="container mx-auto px-4 max-w-2xl">
            <div class="bg-white rounded-2xl shadow-xl border border-[#E6CCB2]/30 overflow-hidden">
                <div class="bg-[#4E030E] p-6 text-center">
                    <h1 class="text-2xl font-serif font-bold text-white tracking-wide">User Profile</h1>
                    <p class="text-[#E6CCB2] text-sm">Manage your account information</p>
                </div>

                <div class="p-8">
                    <form method="POST" action="{{ route('users.update',$user->id) }}" id="profileForm">
                        @csrf
                        @method("PUT")

                        <div class="space-y-6">
                            {{-- Name --}}
                            <div>
                                <label for="name" class="block text-sm font-medium text-[#7F5539] mb-1">Name</label>
                                <input id="name" type="text" 
                                    class="w-full px-4 py-2 bg-[#FDFBF7] border border-[#E6CCB2] rounded-lg text-[#4E030E] focus:outline-none focus:ring-2 focus:ring-[#A67C52] focus:border-transparent transition-all read-only:opacity-70 read-only:cursor-not-allowed" 
                                    name="name" value="{{ $user->name }}" required autocomplete="name" readonly>
                                @error('name')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            {{-- Email --}}
                            <div>
                                <label for="email" class="block text-sm font-medium text-[#7F5539] mb-1">Email Address</label>
                                <input id="email" type="email" 
                                    class="w-full px-4 py-2 bg-[#FDFBF7] border border-[#E6CCB2] rounded-lg text-[#4E030E] focus:outline-none focus:ring-2 focus:ring-[#A67C52] focus:border-transparent transition-all read-only:opacity-70 read-only:cursor-not-allowed" 
                                    name="email" value="{{ $user->email }}" required autocomplete="email" readonly>
                                @error('email')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            {{-- Username --}}
                            <div>
                                <label for="username" class="block text-sm font-medium text-[#7F5539] mb-1">Username</label>
                                <input id="username" type="text" 
                                    class="w-full px-4 py-2 bg-[#FDFBF7] border border-[#E6CCB2] rounded-lg text-[#4E030E] focus:outline-none focus:ring-2 focus:ring-[#A67C52] focus:border-transparent transition-all read-only:opacity-70 read-only:cursor-not-allowed" 
                                    name="username" value="{{ $user->username }}" required autocomplete="username" readonly>
                                @error('username')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            {{-- Phone --}}
                            <div>
                                <label for="phone" class="block text-sm font-medium text-[#7F5539] mb-1">Phone</label>
                                <input id="phone" type="text" 
                                    class="w-full px-4 py-2 bg-[#FDFBF7] border border-[#E6CCB2] rounded-lg text-[#4E030E] focus:outline-none focus:ring-2 focus:ring-[#A67C52] focus:border-transparent transition-all read-only:opacity-70 read-only:cursor-not-allowed" 
                                    name="phone" value="{{ $user->phone }}" required autocomplete="phone" readonly>
                                @error('phone')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            {{-- Address --}}
                            <div>
                                <label for="address" class="block text-sm font-medium text-[#7F5539] mb-1">Address</label>
                                <textarea id="address" 
                                    class="w-full px-4 py-2 bg-[#FDFBF7] border border-[#E6CCB2] rounded-lg text-[#4E030E] focus:outline-none focus:ring-2 focus:ring-[#A67C52] focus:border-transparent transition-all read-only:opacity-70 read-only:cursor-not-allowed h-32" 
                                    name="address" required autocomplete="address" readonly>{{ $user->address }}</textarea>
                                @error('address')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        {{-- Actions --}}
                        <div class="mt-8 flex gap-4 border-t border-[#E6CCB2]/30 pt-6">
                             <button id="editButton" type="button" 
                                class="px-6 py-2 bg-[#4E030E] text-white font-medium rounded-full shadow hover:bg-[#3D020B] transition-colors">
                                Edit Profile
                            </button>
                            
                            <button id="saveButton" type="submit" style="display: none"
                                class="px-6 py-2 bg-green-600 text-white font-medium rounded-full shadow hover:bg-green-700 transition-colors">
                                Save Changes
                            </button>
                            
                            <button id="cancelButton" type="button" style="display: none"
                                class="px-6 py-2 bg-gray-500 text-white font-medium rounded-full shadow hover:bg-gray-600 transition-colors">
                                Cancel
                            </button>
                            
                            <a href="{{ route('home') }}" id="cancelHomeButton" 
                                class="px-6 py-2 border border-gray-300 text-gray-500 font-medium rounded-full hover:bg-gray-50 transition-colors">
                                Back to Home
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('after-script')
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const editBtn = document.getElementById('editButton');
            const saveBtn = document.getElementById('saveButton');
            const cancelBtn = document.getElementById('cancelButton');
            const homeBtn = document.getElementById('cancelHomeButton');
            const inputs = document.querySelectorAll('#profileForm input, #profileForm textarea');

            editBtn.addEventListener('click', () => {
                inputs.forEach(input => input.readOnly = false);
                editBtn.style.display = 'none';
                homeBtn.style.display = 'none';
                saveBtn.style.display = 'inline-block';
                cancelBtn.style.display = 'inline-block';
            });

            cancelBtn.addEventListener('click', () => {
                inputs.forEach(input => input.readOnly = true);
                editBtn.style.display = 'inline-block';
                homeBtn.style.display = 'inline-block';
                saveBtn.style.display = 'none';
                cancelBtn.style.display = 'none';
            });
        });
    </script>
@endpush
