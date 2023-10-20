<?php

enum SpriteType: string
{
  case avataaars = 'avataaars';
  case adventurer = 'adventurer';
  case lorelei = 'lorelei';
  case notionists = 'notionists';
}

Enum ProviderType {
  case DICEBEAR;
  case ROBOTHASH;
}

function lineBreak(Int $lines = 1) {
  for ($i = 1; $i <= $lines; $i++) {
    echo "<br/>";
  }
}