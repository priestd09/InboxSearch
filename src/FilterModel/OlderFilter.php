<?php

namespace Swm\InboxSearch\FilterModel;

use Swm\InboxSearch\Model\InboxSearchInterface;

class OlderFilter implements FilterInterface
{
    /**
     * @param  string  $content
     * @return boolean
     */
    public function isSatisfied($content)
    {
        return (strstr($content, InboxSearchInterface::FILTER_OLDER));
    }

    /**
     * @param  InboxSearchInterface $InboxSearch
     * @param  string               $term
     * @return InboxSearchInterface
     */
    public function update(InboxSearchInterface $inboxSearch, $term)
    {
        $cleanTerm = str_replace(InboxSearchInterface::FILTER_OLDER . ':', '', $term);
        $expTerm = explode(' ', $cleanTerm);

        $inboxSearch->setOlder(new \DateTime($cleanTerm));
        $inboxSearch->addKeywordForFilter(InboxSearchInterface::FILTER_OLDER, implode(' ', $expTerm));

        return $inboxSearch;
    }
}