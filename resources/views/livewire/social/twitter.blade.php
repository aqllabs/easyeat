<a
    href="{{ route('socialite.redirect', 'twitter') }}"
    class="justify-center mb-2 flex rounded-md px-6 py-2.5 text-xs font-medium uppercase leading-normal text-grey border input-bordered shadow transition duration-150 ease-in-out hover:shadow-lg focus:shadow-lg focus:outline-none focus:ring-0 active:shadow-lg">
          <span class="[&>svg]:h-4 [&>svg]:w-4 mr-4">
            <svg xmlns="http://www.w3.org/2000/svg"
                 fill="currentColor"
                 viewBox="0 0 512 512">
              <path
                  d="M389.2 48h70.6L305.6 224.2 487 464H345L233.7 318.6 106.5 464H35.8L200.7 275.5 26.8 48H172.4L272.9 180.9 389.2 48zM364.4 421.8h39.1L151.1 88h-42L364.4 421.8z" />
            </svg>
          </span>
    <span>{{ __('Continue with X') }}</span>
</a>
