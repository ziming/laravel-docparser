<?php

declare(strict_types=1);

namespace Ziming\LaravelDocparser;

use Carbon\CarbonInterface;
use GuzzleHttp\Promise\PromiseInterface;
use Illuminate\Http\Client\ConnectionException;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;

final readonly class LaravelDocparser
{
    public static function make(): self
    {
        return new self;
    }

    /**
     * @see https://docparser.com/api/#list-document-parsers?ref=iavng
     *
     * @throws ConnectionException
     */
    public function listDocumentParsers(): PromiseInterface|Response
    {
        return Http::docparser()
            ->get('/v1/parsers');
    }

    /**
     * @see https://docparser.com/api/#list-parser-model-layouts?ref=iavng
     *
     * @throws ConnectionException
     */
    public function listParserModelLayouts(string $parserId): PromiseInterface|Response
    {
        return Http::docparser()
            ->get("/v1/parser/models/{$parserId}");
    }

    /**
     * @see https://docparser.com/api/#import-documents?ref=iavng
     *
     * @throws ConnectionException
     */
    public function uploadDocumentFromLocalPath(string $parserId, string $filePath, ?string $remoteId = null): PromiseInterface|Response
    {
        return Http::docparser()
            ->post("/v1/document/upload/{$parserId}", [
                'file' => $filePath,
                'remote_id' => $remoteId,
            ]);
    }

    /**
     * @see https://docparser.com/api/#import-documents?ref=iavng
     *
     * @throws ConnectionException
     */
    public function uploadDocumentByContent(string $parserId, string $fileContent, ?string $fileName = null, ?string $remoteId = null): PromiseInterface|Response
    {
        return Http::docparser()
            ->post("/v1/document/upload/{$parserId}", [
                'file_content' => $fileContent,
                'file_name' => $fileName,
                'remote_id' => $remoteId,
            ]);
    }

    /**
     * @see https://docparser.com/api/#import-documents?ref=iavng
     *
     * @throws ConnectionException
     */
    public function fetchDocumentFromUrl(string $parserId, string $url, ?string $remoteId = null): PromiseInterface|Response
    {
        return Http::docparser()
            ->post("/v2/document/fetch/{$parserId}", [
                'url' => $url,
                'remote_id' => $remoteId,
            ]);
    }

    /**
     * @see https://docparser.com/api/#document-status?ref=iavng
     *
     * @throws ConnectionException
     */
    public function documentStatus(string $parserId, string $documentId): PromiseInterface|Response
    {
        return Http::docparser()
            ->get("/v2/document/status/{$parserId}/{$documentId}");
    }

    /**
     * @see https://docparser.com/api/#get-data-of-one-document?ref=iavng
     *
     * @throws ConnectionException
     */
    public function getDataOfOneDocument(string $parserId, string $documentId, ?string $format = null, ?bool $includeChildren = null): PromiseInterface|Response
    {
        return Http::docparser()
            ->get("/v1/results/{$parserId}/{$documentId}", [
                'format' => $format,
                'include_children' => $includeChildren,
            ]);
    }

    /**
     * @see https://docparser.com/api/#get-data-of-multiple-documents?ref=iavng
     *
     * @throws ConnectionException
     */
    public function getDataOfMultipleDocuments(string $parserId, ?string $format = null, ?string $list = null, ?int $limit = null, ?CarbonInterface $date = null, ?string $remoteId = null, ?bool $includeProcessingQueue = null, ?string $sortBy = null, ?string $sortOrder = null): PromiseInterface|Response
    {
        return Http::docparser()
            ->get("/v1/results/{$parserId}", [
                'format' => $format,
                'list' => $list,
                'limit' => $limit,
                'date' => $date?->toIso8601String(),
                'remote_id' => $remoteId,
                'include_processing_queue' => $includeProcessingQueue,
                'sort_by' => $sortBy,
                'sort_order' => $sortOrder,
            ]);
    }

    /**
     * @see https://docparser.com/api/#re-parse-data?ref=iavng
     *
     * @throws ConnectionException
     */
    public function reparseData(string $parserId, array $documentIds): PromiseInterface|Response
    {
        return Http::docparser()
            ->post("/v1/document/reparse/{$parserId}", [
                'document_ids' => $documentIds,
            ]);
    }

    /**
     * @see https://docparser.com/api/#re-integrate-data?ref=iavng
     *
     * @throws ConnectionException
     */
    public function reIntegrateData(string $parserId, array $documentIds): PromiseInterface|Response
    {
        return Http::docparser()
            ->post("/v1/document/reintegrate/{$parserId}", [
                'document_ids' => $documentIds,
            ]);
    }

    /**
     * @see https://docparser.com/api/#authentication?ref=iavng
     *
     * @throws ConnectionException
     */
    public function ping(): PromiseInterface|Response
    {
        return Http::docparser()
            ->get('/v1/ping');
    }
}
