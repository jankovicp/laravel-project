<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <section class="col-span-8 col-start-5 mt-10 space-y-6">
        <form method="POST" action="/dashboard/accommodations" class="border border-gray-200 p-6 rounded-xl">
            @csrf

            <header>
                <h3> Register your accommodation</h3>
            </header>


                Name of accommodation: <input type="text" name="name" placeholder="Enter name here..."><br>
                Number of rooms: <input type="" name="number" placeholder="Enter number here..."><br>
                Address: <input type="adress" name="address" placeholder="Enter adress here..."><br><br>

            <div>

                <button type="submit">Register</button>

            </div>


        </form>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    You're logged in!
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
