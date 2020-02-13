<?php

namespace TripSorter\Transport\BoardingCards;

interface BoardingCardInterface {
    
    function getFrom();
    
    function getTo();
    
    function __toString();
}
