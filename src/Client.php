<?php

declare(strict_types=1);

namespace Linkage\SendgridMarketingCampaignApiClient;

use Linkage\SendgridMarketingCampaignApiClient\ContactList\CreateContactListRequest;
use Linkage\SendgridMarketingCampaignApiClient\ContactList\CreateContactListResponse;
use Linkage\SendgridMarketingCampaignApiClient\Recipients\CreateRecipientsRequest;
use Linkage\SendgridMarketingCampaignApiClient\Recipients\CreateRecipientsResponse;

readonly class Client implements ClientInterface
{
    public function __construct(
        private HttpRequester $requester,
    ) {
    }

    /**
     * @throws SendgridApiClientException
     * @throws SendgridApiServerException
     */
    public function createContactList(
        CreateContactListRequest $request,
    ): CreateContactListResponse {
        return $this->requester->post(
            '/contactdb/lists',
            $request,
            CreateContactListResponse::class,
        );
    }

    /**
     * @throws SendgridApiClientException
     * @throws SendgridApiServerException
     */
    public function createRecipients(CreateRecipientsRequest $request): CreateRecipientsResponse
    {
        return $this->requester->post(
            '/contactdb/recipients',
            $request,
            CreateRecipientsResponse::class,
        );
    }
}
