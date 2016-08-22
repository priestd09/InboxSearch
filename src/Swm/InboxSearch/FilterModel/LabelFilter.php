<?php

namespace Swm\InboxSearch\FilterModel;

use Swm\InboxSearch\Model\InboxSearchInterface;

class LabelFilter implements FilterInterface
{
    public function isSatisfied($content)
    {
        return (strstr($content, InboxSearchInterface::FILTER_LABEL));
    }

    /**
     * @param  InboxSearchInterface $InboxSearch
     * @param  string               $term
     * @return InboxSearchInterface
     */
    public function update(InboxSearchInterface $inboxSearch, $term)
    {
        $cleanTerm = str_replace(InboxSearchInterface::FILTER_LABEL . ':', '', $term);
        $expTerm = explode(' ', $cleanTerm);

        $inboxSearch->setLabel($cleanTerm);

        return $inboxSearch;
    }
}