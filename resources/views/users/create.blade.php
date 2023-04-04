<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Roles') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">


                    <form method="POST" action="{{route('users.store')}}">
                    @csrf
                        <div class="mb-6">
                            <label for="email"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                            <input type="text" name="name"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                >

                                <span class="text-red-500">@error('name')
                                     {{$message}}
                                @enderror</span>
                        </div>
                        <div class="mb-6">
                            <label
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                Email</label>
                            <input type="text"  name="email" 
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                >
                                <span class="text-red-500">@error('email')
                                     {{$message}}
                                @enderror</span>
                        </div>

                         <div class="mb-6">
                            <label
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                Password</label>
                            <input type="password"  name="password" 
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                >
                                <span class="text-red-500">@error('password')
                                     {{$message}}
                                @enderror</span>
                        </div>

                        <label for="countries"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select an
                            option</label>
                        <select id="countries"  name="roles[]" id="role" multiple="multiple"
                            class="bg-gray-50 border role mb-10 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                           @foreach ($roles as $permission)
                                    <option class="form-control" data-role-id="{{ $permission->id }}"
                                        data-role-slug="{{ $permission->slug }}" value="{{ $permission->id }}">
                                        {{ $permission->name }}
                                    </option>
                          @endforeach
                        </select>
                       
                        <button type="submit"
                            class="text-white mt-8 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Add role</button>
                    </form>


                </div>
            </div>
        </div>
    </div>
<script type="text/javascript">

      $('.role').select2();
        if ($(this).val() == 'all') {
            // select all options except first one
            $('.role > option:not(:first)').prop('selected', true);

            // unselect "Select All" option
            $('.role > option:first').prop('selected', false);
            $('.role').trigger('change');
        }

    </script>
</x-app-layout>
