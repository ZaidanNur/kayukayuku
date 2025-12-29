{{-- Checkout/Order Modal --}}
<div id="checkout-modal" class="fixed inset-0 z-[60] hidden overflow-y-auto" aria-labelledby="modal-title" role="dialog"
    aria-modal="true">
    {{-- Backdrop --}}
    <div class="fixed inset-0 bg-stone-900/50 backdrop-blur-sm transition-opacity"
        onclick="toggleModal('checkout-modal')"></div>

    <div class="flex min-h-full items-center justify-center p-4 text-center sm:p-0">
        <div
            class="relative transform overflow-hidden rounded-xl bg-white text-left shadow-2xl transition-all sm:my-8 sm:w-full sm:max-w-lg border border-[#E6CCB2]">
            <div class="bg-[#FDFBF7] px-4 py-3 border-b border-[#E6CCB2]/50 flex justify-between items-center">
                <h3 class="text-xl font-serif font-bold text-[#4E030E]" id="modal-title">Place Order</h3>
                <button type="button" class="text-stone-400 hover:text-[#4E030E]"
                    onclick="toggleModal('checkout-modal')">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            <div class="px-6 py-6 space-y-4">
                {{-- Error Alert --}}
                @if($errors->any())
                    <div class="bg-red-50 border-l-4 border-red-500 text-red-700 p-3 rounded text-sm mb-4">
                        <ul class="list-disc ml-5">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form id="checkout-form" action="{{ route('orders.store') }}" method="POST" class="space-y-4">
                    @csrf
                    {{-- Hidden Inputs --}}
                    <input id="modal-product-id" type="hidden" name="product_id" required>
                    <input id="modal-cart-id" type="hidden" name="cart_id" required>
                    <input id="modal-amount" type="hidden" name="amount" required>
                    @guest
                    @else
                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">

                        <div>
                            <label for="modal-name" class="block text-sm font-medium text-[#7F5539] mb-1">Customer
                                Name</label>
                            <input id="modal-name" name="name" type="text" placeholder="Your Name" required
                                class="w-full rounded-md border-[#E6CCB2] shadow-sm focus:border-[#A67C52] focus:ring focus:ring-[#A67C52]/20 sm:text-sm px-3 py-2 bg-white">
                        </div>
                    @endguest

                    <div>
                        <label for="modal-product-name"
                            class="block text-sm font-medium text-[#7F5539] mb-1">Product</label>
                        <input id="modal-product-name" type="text" disabled
                            class="w-full rounded-md border-[#E6CCB2] bg-stone-100 text-stone-500 shadow-sm sm:text-sm px-3 py-2 cursor-not-allowed">
                    </div>

                    <div>
                        <label for="modal-address" class="block text-sm font-medium text-[#7F5539] mb-1">Delivery
                            Address</label>
                        <textarea id="modal-address" name="address" rows="3" placeholder="Full Address" required
                            class="w-full rounded-md border-[#E6CCB2] shadow-sm focus:border-[#A67C52] focus:ring focus:ring-[#A67C52]/20 sm:text-sm px-3 py-2"></textarea>
                    </div>

                    <div>
                        <label for="modal-phone" class="block text-sm font-medium text-[#7F5539] mb-1">Phone
                            Number</label>
                        <input id="modal-phone" name="phone_number" type="tel" placeholder="08..." required
                            class="w-full rounded-md border-[#E6CCB2] shadow-sm focus:border-[#A67C52] focus:ring focus:ring-[#A67C52]/20 sm:text-sm px-3 py-2">
                    </div>

                    <div>
                        <label for="modal-note" class="block text-sm font-medium text-[#7F5539] mb-1">Note
                            (Optional)</label>
                        <textarea id="modal-note" name="note" rows="2" placeholder="Start typing..."
                            class="w-full rounded-md border-[#E6CCB2] shadow-sm focus:border-[#A67C52] focus:ring focus:ring-[#A67C52]/20 sm:text-sm px-3 py-2"></textarea>
                    </div>

                    <div class="pt-4 flex justify-end gap-3">
                        <button type="button" onclick="toggleModal('checkout-modal')"
                            class="px-4 py-2 bg-white text-stone-600 border border-stone-300 rounded-md hover:bg-stone-50 transition-colors text-sm font-medium">
                            Cancel
                        </button>
                        <button type="submit"
                            class="px-6 py-2 bg-[#4E030E] text-white rounded-md hover:bg-[#3D020B] transition-colors shadow-md text-sm font-bold">
                            Place Order
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>