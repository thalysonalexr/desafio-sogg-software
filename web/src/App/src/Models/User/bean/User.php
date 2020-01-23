<?php

declare(strict_types=1);

namespace App\Models\User\bean;

final class User implements \JsonSerializable
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $nome;

    /**
     * @var string
     */
    private $cpf;

    /**
     * @var string
     */
    private $dataNasc;

    /**
     * @var string
     */
    private $sexo;

    /**
     * @var string
     */
    private $civil;

    /**
     * @var string
     */
    private $email;

    /**
     * @var string
     */
    private $telefone;

    /**
     * @var string
     */
    private $endereco;

    /**
     * @var string
     */
    private $cep;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNome(): string
    {
        return $this->nome;
    }

    public function getCpf(): string
    {
        return $this->cpf;
    }

    public function getDataNasc(): string
    {
        return $this->dataNasc;
    }

    public function getSexo(): ?string
    {
        return $this->sexo;
    }

    public function getCivil(): ?string
    {
        return $this->civil;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getTelefone(): ?string
    {
        return $this->telefone;
    }

    public function getEndereco(): ?string
    {
        return $this->endereco;
    }

    public function getCep(): ?string
    {
        return $this->cep;
    }

    private function __construct(
        ?int $id,
        string $nome,
        string $cpf,
        string $dataNasc,
        ?string $sexo,
        ?string $civil,
        string $email,
        ?string $telefone,
        ?string $endereco,
        ?string $cep
    )
    {
        $this->id = $id;
        $this->nome = $nome;
        $this->cpf = $cpf;
        $this->dataNasc = $dataNasc;
        $this->sexo = $sexo;
        $this->civil = $civil;
        $this->email = $email;
        $this->telefone = $telefone;
        $this->endereco = $endereco;
        $this->cep = $cep;
    }

    public static function new(
        ?int $id,
        string $nome,
        string $cpf,
        string $dataNasc,
        ?string $sexo,
        ?string $civil,
        string $email,
        ?string $telefone,
        ?string $endereco,
        ?string $cep
    ): self
    {
        return new self(
            $id,
            $nome,
            $cpf,
            $dataNasc,
            $sexo,
            $civil,
            $email,
            $telefone,
            $endereco,
            $cep
        );
    }

    public function jsonSerialize(): array
    {
        return [
            'id' => $this->id,
            'nome' => $this->nome,
            'cpf' => $this->cpf,
            'data_nasc' => $this->dataNasc,
            'sexo' => $this->sexo,
            'civil' => $this->civil,
            'email' => $this->email,
            'telefone' => $this->telefone,
            'endereco' => $this->endereco,
            'cep' => $this->cep
        ];
    }
}
