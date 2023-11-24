<x-app-layout>
    <x-slot name="header"><h2 class="font-semibold text-xl text-gray-800 leading-tight">Contact</h2></x-slot>
    <div class="py-12 max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2758.630149892233!2d-63.142056084521414!3d46.257579888174064!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4b5e52b523915db9%3A0x1bf44d9e22aff6b9!2sHealth%20Sciences%20Building%20(HSB)!5e0!3m2!1sen!2sca!4v1675538803180!5m2!1sen!2sca"
            width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy"
            referrerpolicy="no-referrer-when-downgrade">

        </iframe>



        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
            <div class="py-8 lg:py-16 px-4 mx-auto max-w-screen-md">
                @if (session()->has('contact-message'))
                    <div
                        x-data="{ show: true }"
                        x-show="show"
                        x-transition
                        x-init="setTimeout(() => show = true, 3000)"
                        class="flex p-2 mb-4 text-sm text-green-800 border border-green-300 rounded-lg bg-green-50" role="alert">
                        <svg aria-hidden="true" class="flex-shrink-0 inline w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
                        <div>
                            <span class="font-medium">{{ session('contact-message') }}</span>
                        </div>
                    </div>
                @endif
                <h2 class="mb-4 text-2xl font-extrabold text-center text-gray-700">Get in touch</h2>
                <p class="mb-8 lg:mb-16 font-light text-center text-gray-500 text-lg">
                    Please use the contact form to get in touch with us if you have any comments, questions, or suggestions.
                </p>
                <form method="POST" action="{{route('contact.store')}}" class="space-y-6">
                    @csrf

                    <div>
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Your email</label>
                        <input name="email" type="email" id="email" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5" required>
                    </div>
                    <div>
                        <label for="subject" class="block mb-2 text-sm font-medium text-gray-900">Subject</label>
                        <input name="subject" type="text" id="subject" class="block p-3 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 shadow-sm focus:ring-primary-500 focus:border-primary-500" placeholder="Let us know how we can help you" required>
                    </div>
                    <div class="sm:col-span-2">
                        <label for="message" class="block mb-2 text-sm font-medium text-gray-900">Your message</label>
                        <textarea name="message" id="message" rows="6" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg shadow-sm border border-gray-300 focus:ring-primary-500 focus:border-primary-500" placeholder="Leave a comment..."></textarea>
                    </div>
                    <x-primary-button>Send</x-primary-button>

                </form>
            </div>
        </div>
    </div>
</x-app-layout>
