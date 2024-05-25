<div class="p-2 md:p-0 md:py-4">
    <x-slot name="header">
        <h2 class="text-gray-800 flex items-center gap-4 leading-tight">
            <i class="fas text-blue-500 fa-users"></i>
            {{ __('Referrals') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl relative h-full mx-auto">
        <div class="flex sm:mx-3 gap-4 lg:mx-4 h-full flex-row">
            <div class="flex gap-2 h-[85vh] p-4 bg-white w-full rounded-lg">
                <h1 class="text-gray-800 text-center text-2xl font-semibold">
                    Referrals
                </h1>
                @foreach ($referrals as $referral)
                    <div>
                        <p>Referred Email: {{ $referral->referred_email }}</p>
                        <p>Discount Amount: {{ $referral->discount_amount }}</p>
                    </div>
                @endforeach
                {{--If we have no refferals --}}
                @if ($referrals->count() == 0)
                    <div class="flex items-center w-full flex-col justify-center h-full">
                        <i class="far fa-bell-slash text-4xl text-gray-500"></i>
                        <p class="text-gray-500">No referrals yet.</p>
                        <p class="text-gray-500 text-center">
                            Your referral link is this website/auth id
                            <br>
                            <span>
                                {{ env('APP_URL') . '/auth/' . auth()->user()->id }}
                            </span>
                        </p>
                        <!-- Copy to clipboard -->
                        <div class="flex items-center gap-2">
                            <input type="text" value="{{ env('APP_URL') . '/auth/' . auth()->user()->id }}"
                                   id="referralLink" class="w-1/2 p-2 hidden border border-gray-300 rounded-lg">
                            <button onclick="copyToClipboard()" class="bg-blue-500 text-white px-4 py-2 rounded-lg">
                                Copy <i class="fas fa-copy"></i>
                            </button>
                            <script>
                                function copyToClipboard() {
                                    const copyText = document.getElementById('referralLink');
                                    copyText.select();
                                    copyText.setSelectionRange(0, 99999);
                                    console.log(document.execCommand('copy'));
                                    document.execCommand('copy')
                                    //on a mac
                                    navigator.clipboard.writeText(copyText.value);
                                    alert('Copied the text: ' + copyText.value);
                                }
                            </script>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
