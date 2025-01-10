@extends("layouts.auth")

@section("title","Auth@Signin")

@section("content")

    <!-- Login Form -->
    <div
      class="bg-white dark:bg-gray-800 shadow-lg rounded-lg p-8 w-full max-w-md"
    >
      <h2 class="text-2xl font-bold text-center mb-6">Login</h2>
          @include("partials.alert")

      <form action="{{ route('auth.signin.post') }}" method="POST">
        @csrf

        <x-form-input type="text" id="name" name="name" placeholder="" label="Username"/>

        <x-form-input type="password" id="password" name="password" placeholder="" label="Password"/>

        <!-- Remember Me -->
        <div class="flex items-center justify-between mb-4">
          <label class="flex items-center">
            <input
              type="checkbox"
              name="remember"
              class="text-indigo-600 border-gray-300 focus:ring-indigo-500 dark:border-gray-600 dark:focus:ring-indigo-400"
            />
            <span class="ml-2 text-sm">Remember me</span>
          </label>
          <a
            href="/forgot-password"
            class="text-sm text-indigo-600 hover:underline dark:text-indigo-400"
            >Forgot password?</a
          >
        </div>

        <!-- Login Button -->
        <button
          type="submit"
          class="w-full bg-indigo-600 text-white py-2 px-4 rounded-lg font-medium hover:bg-indigo-700 dark:bg-indigo-400 dark:hover:bg-indigo-500 transition-colors"
        >
          Signin
        </button>
      </form>

      <!-- Signup Link -->
      <p class="text-sm text-center mt-4">
        Don't have an account?
        <a
          href="{{ route('auth.signup.get') }}"
          class="text-indigo-600 hover:underline dark:text-indigo-400"
          >Sign Up</a
        >
      </p>
    </div>

@endsection
