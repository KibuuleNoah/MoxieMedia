@extends("layouts.auth")

@section("title","Auth@Signup")

@section("content")
<!-- Signup Form -->
    <div
      class="bg-white dark:bg-gray-800 shadow-lg rounded-lg p-8 w-full max-w-md"
    >
      <h2 class="text-2xl font-bold text-center mb-6">Sign Up</h2>
    {{--   @if ($errors->any()) --}}
    {{--     @foreach($errors->all() as $error) --}}
    {{--         <div class="text-red-700 bg-red-100 border-1 border-red-200 rounded shadow-lg p-4">{{ $error }}</div> --}}
    {{--     @endforeach --}}
    {{-- @endif --}}


        @include("partials.alert")
      <form action="{{ route('auth.signup.post') }}" method="POST">
        @csrf

        <x-form-input type="text" id="name" name="name" placeholder="" label="Username" />

        <!-- Email Address -->
        <x-form-input type="email" id="email" name="email" placeholder="" label="Email"/>

        <!-- Password -->
        <x-form-input type="password" id="password" name="password" placeholder="" label="Password"/>

        <!-- Confirm Password -->
        <x-form-input type="password" id="password_confirmation" name="password_confirmation" placeholder="" label="Confirm Password"/>

        <!-- Signup Button -->
        <button
          type="submit"
          class="w-full bg-indigo-600 text-white py-2 px-4 rounded-lg font-medium hover:bg-indigo-700 dark:bg-indigo-400 dark:hover:bg-indigo-500 transition-colors"
        >
          Create Account
        </button>
      </form>

      <!-- Already have an account -->
      <p class="text-sm text-center mt-4">
        Already have an account?
        <a
          href="{{ route('auth.signin.get') }}"
          class="text-indigo-600 hover:underline dark:text-indigo-400"
          >Signin</a
        >
      </p>
    </div>

@endsection

