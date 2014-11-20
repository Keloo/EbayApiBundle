<?php
/**
 * @link http://developer.ebay.com/DevZone/xml/docs/Reference/ebay/GetSellerList.html
 */

namespace WebConsul\EbayApiBundle\Call\Trading;

class GetSellerListCall extends BaseTradingCall
{
    private $granularityLevel;
    private $pageNumber;
    private $startTimeFrom;
    private $startTimeTo;
    private $includeWatchCount;
    private $entriesPerPage;
    private $userId;

    public $standardInputFields = array(
//        'DetailLevel',
        'ErrorLanguage',
        'MessageID',
        'OutputSelector',
        'Version',
        'WarningLevel'
    );

    /**
     * @return mixed
     */
    public function getPageNumber()
    {
        return $this->pageNumber;
    }

    /**
     * @param mixed $pageNumber
     */
    public function setPageNumber($pageNumber)
    {
        $this->pageNumber = $pageNumber;
    }

    /**
     * @return mixed
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * @param mixed $userId
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getEntriesPerPage()
    {
        return $this->entriesPerPage;
    }

    /**
     * @param mixed $entriesPerPage
     */
    public function setEntriesPerPage($entriesPerPage)
    {
        $this->entriesPerPage = $entriesPerPage;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getGranularityLevel()
    {
        return $this->granularityLevel;
    }

    /**
     * @param mixed $granularityLevel
     */
    public function setGranularityLevel($granularityLevel)
    {
        $this->granularityLevel = $granularityLevel;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getIncludeWatchCount()
    {
        return $this->includeWatchCount;
    }

    /**
     * @param mixed $includeWatchCount
     */
    public function setIncludeWatchCount($includeWatchCount)
    {
        $this->includeWatchCount = $includeWatchCount;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getStartTimeFrom()
    {
        return $this->startTimeFrom;
    }

    /**
     * @param mixed $startTimeFrom
     */
    public function setStartTimeFrom($startTimeFrom)
    {
        $this->startTimeFrom = $startTimeFrom;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getStartTimeTo()
    {
        return $this->startTimeTo;
    }

    /**
     * @param mixed $startTimeTo
     */
    public function setStartTimeTo($startTimeTo)
    {
        $this->startTimeTo = $startTimeTo;

        return $this;
    }


    /**
     * @return mixed
     */
    public function getInput()
    {
        $this->input .= '<RequesterCredentials><eBayAuthToken>' . parent::$parameters['auth_token'] . '</eBayAuthToken></RequesterCredentials>' . "\n";

        if ($this->granularityLevel) {
            $this->input .= '<GranularityLevel>' . $this->granularityLevel . '</GranularityLevel> ';
        }
        if ($this->startTimeFrom) {
            $this->input .= '<StartTimeFrom>' . $this->startTimeFrom . '</StartTimeFrom>';
        }
        if ($this->startTimeTo) {
            $this->input .= '<StartTimeTo>' . $this->startTimeTo . '</StartTimeTo>';
        }
        if ($this->includeWatchCount) {
            $this->input .= '<IncludeWatchCount>' . $this->includeWatchCount . '</IncludeWatchCount>';
        }
        $this->input .= '<Pagination>';
        if ($this->entriesPerPage) {
            $this->input .= '<EntriesPerPage>' . $this->entriesPerPage . '</EntriesPerPage>';
        }
        if ($this->pageNumber) {
            $this->input .= '<PageNumber>' . $this->pageNumber . '</PageNumber>';
        }
        $this->input .= '</Pagination>';

        if ($this->userId) {
            $this->input .= '<UserID>' . $this->userId . '</UserID>';
        }

        return $this->input;
    }

}