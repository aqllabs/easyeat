<footer class="footer p-10 bg-base-200 text-base-content">
    <nav>
        <h6 class="footer-title">{{ __('Company') }}</h6>
        <a href="{{ route('about') }}" class="link link-hover">{{ __('About us') }}</a>
        <a href="{{ route('about') }}#contact" class="link link-hover">{{ __('Contact') }}</a>
    </nav>
    <nav>
        <h6 class="footer-title">{{ __('Legal') }}</h6>
        <a href="https://docs.google.com/document/d/1HY1aCFBj0Zgm5nZl00GjkAxHsuVc6zJ1ehkTBOhLhUI/edit?tab=t.0" target="_blank" class="link link-hover">{{ __('Terms of use') }}</a>
        <a href="https://docs.google.com/document/d/1ooXiKzVbahTsnMb1Y5iQ_bD9O4wycMokNSxTteEgpyY/edit?tab=t.0" target="_blank" class="link link-hover">{{ __('Privacy policy') }}</a>
    </nav>
    <nav>
        <h6 class="footer-title">{{ __('Connect') }}</h6>
        <a href="https://www.instagram.com/foodieexplorerz" target="_blank" class="link link-hover">{{ __('Instagram') }}</a>
    </nav>
    <form wire:submit="save">
        <h6 class="footer-title">{{ __('Reach Out to Us') }}</h6>
        <fieldset class="form-control w-80">
            <label class="label">
                <span class="label-text">{{ __('Get in touch with us') }}</span>
            </label>
            <div class="join">
                <input type="email" placeholder="{{ __('your@email.com') }}" class="input input-bordered join-item" wire:model="email" />
                <button class="btn btn-secondary join-item" wire:loading.attr="disabled">
                    {{ __('Contact') }}
                    <div wire:loading>
                        <span class="loading loading-ring loading-xs"></span>
                    </div>
                </button>
            </div>
        </fieldset>
    </form>
</footer>
