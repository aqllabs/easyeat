<footer class="footer p-10 bg-base-200 text-base-content">
    <nav>
        <h6 class="footer-title">{{ __('Services') }}</h6>
        <a class="link link-hover">{{ __('Branding') }}</a>
        <a class="link link-hover">{{ __('Design') }}</a>
        <a class="link link-hover">{{ __('Marketing') }}</a>
        <a class="link link-hover">{{ __('Advertisement') }}</a>
    </nav>
    <nav>
        <h6 class="footer-title">{{ __('Company') }}</h6>
        <a class="link link-hover">{{ __('About us') }}</a>
        <a class="link link-hover">{{ __('Contact') }}</a>
        <a class="link link-hover">{{ __('Jobs') }}</a>
        <a class="link link-hover">{{ __('Press kit') }}</a>
    </nav>
    <nav>
        <h6 class="footer-title">{{ __('Legal') }}</h6>
        <a href="{{ route('terms.show') }}" class="link link-hover">{{ __('Terms of use') }}</a>
        <a href="{{ route('policy.show') }}" class="link link-hover">{{ __('Privacy policy') }}</a>
        <a class="link link-hover">{{ __('Cookie policy') }}</a>
    </nav>
    <form>
        <h6 class="footer-title">{{ __('Newsletter') }}</h6>
        <fieldset class="form-control w-80">
            <label class="label">
                <span class="label-text">{{ __('Enter your email address') }}</span>
            </label>
            <div class="join">
                <input type="text" placeholder="{{ __('username@site.com') }}" class="input input-bordered join-item" />
                <button class="btn btn-secondary join-item">{{ __('Subscribe') }}</button>
            </div>
        </fieldset>
    </form>
</footer>
