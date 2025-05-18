<?php
declare(strict_types=1);
namespace Cylancer\Eventplanner\Domain\Model;

class ValidationResults
{

    protected array $infos = [];

    protected array $errors = [];

    public function getInfos(): array
    {
        return $this->infos;
    }

    public function getErrors(): array
    {
        return $this->errors;
    }

    public function hasErrors(): bool
    {
        return !empty($this->errors);
    }

    public function hasInfos(): bool
    {
        return !empty($this->infos);
    }

    public function addInfo(string $infoKey, array $arguments = []): void
    {
        $keySplit = explode('.', $infoKey, 2);
        $this->infos["info.$infoKey"]['arguments'] = $arguments;
        $this->infos["info.$infoKey"]['id'] = count($keySplit) == 2 ? $keySplit[0] : $infoKey;
    }

    public function addError(string $errorKey, array $arguments = []): void
    {
        $keySplit = explode('.', $errorKey, 2);
        $this->errors["error.$errorKey"]['arguments'] = $arguments;
        $this->errors["error.$errorKey"]['id'] = count($keySplit) == 2 ? $keySplit[0] : $errorKey;
    }


    public function addInfos(array $infos): void
    {
        foreach ($infos as $info) {
            $this->addInfo($info);
        }
    }

    public function addErrors(array $errors): void
    {
        foreach ($errors as $error) {
            $this->addError($error);
        }
    }
}
