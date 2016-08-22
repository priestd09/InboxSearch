<?php

namespace Swm\InboxSearch\FilterModel;

use Swm\InboxSearch\Model\InboxSearchInterface;

class ToFilter implements FilterInterface
{
    public function isSatisfied($content)
    {
        return (strstr($content, InboxSearchInterface::FILTER_TO));
    }

    /**
     * @param  InboxSearchInterface $InboxSearch
     * @param  string               $term
     * @return InboxSearchInterface
     */
    public function update(InboxSearchInterface $inboxSearch, $term)
    {
        $cleanTerm = str_replace(InboxSearchInterface::FILTER_TO . ':', '', $term);
        $expTerm = explode(' ', $cleanTerm);

        $inboxSearch->setTo($cleanTerm);

        return $inboxSearch;
    }
}