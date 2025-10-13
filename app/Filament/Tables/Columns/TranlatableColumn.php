<?php

namespace App\Filament\Tables\Columns;

use Closure;
use Filament\Tables\Columns\Column;

class TranlatableColumn extends Column
{
    protected string $view = 'filament.tables.columns.tranlatable-column';

    protected string $locale = 'id';
    protected string $columnName = 'name';



    /**
     * Get the value of locale
     */
    public function getLocale()
    {
        return $this->locale;
    }

    /**
     * Get the value of columnName
     */
    public function getColumnName()
    {
        return $this->columnName;
    }

    /**
     * Set the value of locale
     *
     * @return  self
     */
    public function locale(string $locale)
    {
        $this->locale = $locale;
        return $this;
    }

    /**
     * Set the value of columnName
     *
     * @return  self
     */
    public function columnName(string $columnName)
    {
        $this->columnName = $columnName;
        return $this;
    }
}
