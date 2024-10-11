<x-home-layout>
    <livewire:hero/>
    <livewire:partners/>
    <livewire:features-flow/>
    <livewire:integrations/>
    <livewire:content-with-image/>
    @livewire('problem', [
        'heading' => 'Dine with Confidence: Embracing Dietary Diversity with EasyEat',
        'text' => "Navigating dietary restrictions while dining out can be challenging. EasyEat is here to transform your dining experience by connecting you with restaurants that cater to your specific needs. Whether you're gluten-free, vegan, have allergies, or follow any other dietary regimen, we've got you covered.",
        'steps' => [
            ['emoji' => '🔍', 'text' => 'Find Suitable Restaurants: Easily discover dining options that match your dietary requirements.'],
            ['emoji' => '🍽️', 'text' => 'Detailed Menu Information: Access comprehensive menu details and ingredient lists.'],
            ['emoji' => '⭐', 'text' => 'User Reviews: Read experiences from diners with similar dietary needs.'],
            ['emoji' => '📱', 'text' => 'Mobile App: Find restaurants on-the-go with our user-friendly mobile application.'],
        ]
    ])

    <livewire:plans/>
    <livewire:faq/>
    <livewire:cta/>
</x-home-layout>
