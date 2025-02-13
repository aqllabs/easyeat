<?php

namespace App\Forms\Components;

use Filament\Forms\Components\RichEditor;
use Illuminate\Contracts\Filesystem\FilesystemAdapter;
use Throwable;

class PublicRichEditor extends RichEditor
{
    protected function handleUploadedAttachmentUrlRetrieval(mixed $file): ?string
    {
        /** @var FilesystemAdapter $storage */
        $storage = $this->getFileAttachmentsDisk();

        info('file: ' . $file);

        try {
            if (! $storage->exists($file)) {
                return null;
            }
            return $storage->url($file);
        } catch (Throwable $exception) {
            return null;
        }
    }
} 