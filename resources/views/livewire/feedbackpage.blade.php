<?php

use Livewire\Volt\Component;
use Livewire\Attributes\Layout;
use Filament\Tables\Table;
use Filament\Forms\Form;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Actions\CreateAction;

use Filament\Forms\Contracts\HasForms;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Columns\TextInputColumn;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\RichEditor;
use App\Models\Feedback;
use Filament\Tables\Actions\DeleteAction;
use Illuminate\Support\HtmlString;
use Filament\Tables\Columns\Layout\Stack;
use Filament\Tables\Columns\Layout\Split;

use Filament\Tables\Actions\ViewAction;

new #[Layout('layouts.home')]
class extends Component implements HasForms, HasTable {
    use InteractsWithTable;
    use InteractsWithForms;


    public function table(Table $table): Table
    {
        return $table
            ->query(Feedback::query()->orderBy('created_at', 'desc'))
            ->columns([
                TextColumn::make('title')->label('Title')->weight('bold')->description(fn (Feedback $record): string => \Illuminate\Support\Str::limit(strip_tags($record->content), 300))
                ->action(ViewAction::make()->label('View')->form([
                    TextInput::make('title')->label('Title'),
                    RichEditor::make('content')->label('Content')
                ])),
                TextColumn::make('type')->label('Type'),
                TextColumn::make('status')->label('Status')->badge()->color(fn (string $state): string => match ($state) {
                    'open' => 'warning',
                    'closed' => 'success',
                }),
                TextColumn::make('upvotes')->label('Upvotes'),
            ])
            ->paginated(false)
            ->filters([
                // Define your filters here
            ])
            ->actions([
                DeleteAction::make()
                    ->label('Delete')
                    ->color('danger')
                    ->icon('heroicon-o-trash')
                    ->modalWidth('sm')
                    ->modalDescription('Are you sure you want to delete this feedback?')
                    ->visible(fn(): bool => auth()->user()?->email === 'grasbaku@gmail.com'),
                \Filament\Tables\Actions\Action::make('upvote')
                ->label('')
                ->icon('heroicon-o-hand-thumb-up')
                ->color(fn (Feedback $record): string => $record->votes->contains('ip_address', request()->ip()) ? 'success' : 'gray')
                    ->action(function (Feedback $record) {
                        $record->vote(
                            request()->ip(),
                            'upvote',
                            request()->userAgent()
                        );
                    })
            ])
            ->headerActions([
                CreateAction::make()->label('Create')->form([
                    TextInput::make('title')->label('Title')->required(),
                    //            $table->enum('type', ['bug', 'feature', 'content', 'other']);
                    Select::make('type')->label('Type')->options([
                        'feature' => 'Feature Request',
                        'bug' => 'Bug Report',
                        'content' => 'Content Related',
                        'other' => 'Other',
                    ])->required(),
                    RichEditor::make('content')->label('Content')
                        ->fileAttachmentsDisk('s3')
                        ->fileAttachmentsDirectory('attachments')
                        ->fileAttachmentsVisibility('private')
                        ->getUploadedAttachmentUrlUsing(fn($file) => Storage::disk('s3')->url($file))

                ])
            ]);
    }

}; ?>

<div>
<div class="space-y-4">
    <div class="prose">
        <h2>Share Your Feedback</h2>
        <p>We would love to hear your thoughts, suggestions and feedback! Here's how you can participate:</p>
        
        <ul>
            <li>Click the <strong>Create</strong> button above to submit new feedback</li>
            <li>Share bug reports, feature requests, or any other suggestions</li>
            <li>See what others have posted and upvote the ideas you like by clicking the thumbs up icon</li>
            <li>The most upvoted items will help us prioritize what to work on next</li>
        </ul>
    </div>

    {{$this->table}}
</div>
