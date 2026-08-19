<?php

enum ColorInscri: string
{
    case Inscrit = 'inscrit';
    case Attente = 'attente';
    case Non = 'non';

    public static function toEntity(int $idStatut): self
    {
        return match ($idStatut) {
            1 => self::Inscrit,
            2 => self::Attente,
            default => self::Non,
        };
    }
}