<x-home-layout>
    <livewire:hero/>
    <livewire:partners/>
    <livewire:features-flow/>
    <livewire:integrations/>
    <livewire:content-with-image/>
    @livewire('problem', [
        'heading' => 'Empower Your Workflow: Unleashing the Full Potential of SaaS Integrations',
        'text' => 'In today’s fast-paced digital landscape, integrating the right tools can make or break your productivity. With our cutting-edge SaaS platform, you’re not just adopting software—you’re transforming how your team collaborates, manages resources, and achieves success. Explore the possibilities and take your operations to the next level.',
        'steps' => [
            ['emoji' => '🔗', 'text' => 'Connect Your Tools: Effortlessly integrate with key platforms to centralize your workflow.'],
            ['emoji' => '⚙️', 'text' => 'Automate Processes: Set up automated tasks that save time and reduce manual effort.'],
            ['emoji' => '📊', 'text' => 'Gain Insights: Leverage powerful analytics to make data-driven decisions.'],
            ['emoji' => '🚀', 'text' => 'Scale Seamlessly: Adapt and grow with enterprise-level solutions designed for flexibility.'],
        ]
    ])

{{--    for paddle plans use <livewire:paddle-plans/> --}}
    <livewire:plans/>
    <livewire:faq/>
    <livewire:cta/>
</x-home-layout>
