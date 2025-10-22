<?php

namespace HasanAhani\FilamentOtpInput\Components;

use Filament\Forms\Components\Concerns;
use Filament\Forms\Components\Concerns\CanBeAutocapitalized;
use Filament\Forms\Components\Concerns\CanBeAutocompleted;
use Filament\Forms\Components\Concerns\CanBeReadOnly;
use Filament\Forms\Components\Concerns\HasAffixes;
use Filament\Forms\Components\Concerns\HasExtraInputAttributes;
use Filament\Forms\Components\Contracts\CanBeLengthConstrained;
use Filament\Forms\Components\Field;
use Filament\Schemas\Components\Contracts\HasAffixActions;
use Filament\Support\Concerns\HasExtraAlpineAttributes;

class OtpInput extends Field implements CanBeLengthConstrained, HasAffixActions
{
    use CanBeAutocapitalized;
    use CanBeAutocompleted;
    use CanBeReadOnly;
    use Concerns\CanBeLengthConstrained;
    use HasAffixes;
    use HasExtraAlpineAttributes;
    use HasExtraInputAttributes;

    protected string $view = 'filament-otp-input::components.otp-input';

    protected int|\Closure|null $numberInput = 4;

    protected bool|\Closure|null $isRtl = false;

    protected string|\Closure|null $type = 'number';

    public function numberInput(int|\Closure $number = 4): static
    {
        $this->numberInput = $number;

        return $this;
    }

    public function getNumberInput(): int
    {
        return $this->evaluate($this->numberInput);
    }

    public function password(): static
    {
        $this->type = 'password';

        return $this;
    }

    public function text(): static
    {
        $this->type = 'text';

        return $this;
    }

    public function getType(): string
    {
        return $this->evaluate($this->type);
    }

    public function rtl(bool|\Closure $condition = false): static
    {
        $this->isRtl = $condition;

        return $this;
    }

    public function getInputsContainerDirection(): string
    {
        return $this->evaluate($this->isRtl);
    }
}
