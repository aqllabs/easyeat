<section class="relative py-8 lg:py-20" id="features">
    <div class="absolute start-[10%] z-0">
        <div
            class="pointer-events-none aspect-square w-60 rounded-full bg-gradient-to-r from-primary/10 via-violet-500/10 to-purple-500/10 blur-3xl [transform:translate3d(0,0,0)] lg:w-[600px]"
        ></div>
    </div>

    <div class="container">
        <div class="flex flex-col items-center">
            <h2 class="inline text-4xl font-semibold">{{ __('Features Flow') }}</h2>

            <p class="mt-4 text-lg sm:text-center">
                {{ __('In this section you can show your product features, with image and descriptions') }}
            </p>
        </div>

        <div class="relative z-[2] mt-8 grid gap-8 lg:mt-20 lg:grid-cols-2 lg:gap-12">
            <div
                class="overflow-hidden rounded-lg bg-base-200 shadow-md transition-all hover:shadow-xl"
            >
                <img alt="saas img" class="overflow-hidden rounded-ss-lg" src="https://placehold.co/600" />
            </div>

            <div class="lg:mt-8">
                <div class="badge badge-primary">{{ __('Dashboard') }}</div>
                <h3 class="mt-2 text-3xl font-semibold">{{ __('Admin Panel') }}</h3>
                <p class="mt-2 text-base font-medium">
                    {{ __('Control your web app directly from Admin Panel') }}
                </p>

                <ul class="mt-4 list-inside list-disc text-base">
                    <li>{{ __('Users Dashboard') }}</li>
                    <li>{{ __('Widgets') }}</li>
                    <li>{{ __('Roles') }}</li>
                    <li>{{ __('Stats') }}</li>
                </ul>
            </div>
        </div>

        <div class="mt-8 grid gap-8 lg:mt-20 lg:grid-cols-2 lg:gap-12">
            <div>
                <div class="badge badge-primary">{{ __('Control') }}</div>
                <h3 class="mt-2 text-3xl font-semibold">{{ __('Managing Entities') }}</h3>
                <p class="mt-2 text-base">
                    {{ __('Our SaaS platform offers seamless management, allowing you to effortlessly oversee
                    users, projects, and resources in one centralized hub. Gain real-time insights,
                    streamline workflows, and optimize resource allocation for unparalleled efficiency.') }}
                </p>

                <ul class="mt-4 list-inside list-disc text-base">
                    <li>{{ __('User-Friendly Tools') }}</li>
                    <li>{{ __('Resource Management') }}</li>
                    <li>{{ __('Task Assignment') }}</li>
                    <li>{{ __('Robust Control') }}</li>
                </ul>
            </div>

            <div class="order-first lg:order-last">
                <div
                    class="overflow-hidden rounded-lg bg-base-200 shadow-md transition-all hover:shadow-xl"
                >
                    <img alt="saas img" class="overflow-hidden rounded-ss-lg" src="https://placehold.co/600" />
                </div>
            </div>
        </div>

        <div class="mt-8 grid gap-8 lg:mt-20 lg:grid-cols-2 lg:gap-12">
            <div
                class="overflow-hidden rounded-lg bg-base-200 shadow-md transition-all hover:shadow-xl"
            >
                <img alt="saas img" class="overflow-hidden rounded-ss-lg" src="https://placehold.co/600" />
            </div>

            <div class="lg:mt-8">
                <div class="badge badge-primary">{{ __('Workflows') }}</div>
                <h3 class="mt-2 text-3xl font-semibold">{{ __('Seamless Integrations') }}</h3>
                <p class="mt-2 text-base">
                    {{ __('Connect key tools seamlessly with our SaaS platform, streamlining your processes and
                    boosting productivity. Experience a cohesive digital ecosystem that empowers your
                    business for innovation and growth.') }}
                </p>

                <ul class="mt-4 list-inside list-disc text-base">
                    <li>{{ __('Real-time chat with Slack') }}</li>
                    <li>{{ __('Engage your customer with Email') }}</li>
                    <li>{{ __('Getting order from Amazon') }}</li>
                    <li>{{ __('Using Ai from OpenAI') }}</li>
                </ul>
            </div>
        </div>
    </div>
</section>
