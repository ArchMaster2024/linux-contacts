<?php

namespace App\Services;

use Illuminate\Support\Facades\Storage;

class FileStorage
{
    private string $directory;
    private object $file;

    /**
     * Create a new class instance.
     */
    public function __construct(object $file, string $directory)
    {
        $this->file = $file;
        $this->directory = $directory;
    }

    /**
     * Metodo para generar las carpetas
     */
    private function createDirectory(): void
    {
        if (!is_dir($this->directory)) {
            Storage::makeDirectory($this->directory);
        }
    }

    /**
     * Metodo para verificar si un archivo existe
     */
    private function exists(): bool
    {
        if (file_exists($this->directory . '/' . $this->file)) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Metodo para guardar un archivo
     */
    public function saveFile(): string|bool
    {
        if (!$this->exists()) {
            $this->createDirectory();
            $fileSaved = Storage::putFileAs($this->directory, $this->file, $this->file->getClientOriginalName());
            if ($fileSaved) {
                return $fileSaved;
            } else {
                return false;
            }
        }
    }
}
