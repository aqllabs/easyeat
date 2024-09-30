<ul class="steps steps-vertical">
    @foreach($steps as $step)
        <li class="step {{ $step['active'] ? 'step-primary' : '' }}">{{ $step['title'] }}</li>
    @endforeach
</ul>
